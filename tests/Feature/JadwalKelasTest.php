<?php

namespace Tests\Feature;

use App\JadwalKelas;
use App\Models\KelasKursus;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class JadwalKelasTest extends TestCase
{
    use LazilyRefreshDatabase;

    #[DataProvider('validModes')]
    public function test_creates_ordered_sessions_for_each_learning_mode(string $mode, array $meetingModes): void
    {
        $courseClass = KelasKursus::factory()->create(['learning_mode' => $mode]);
        $sessions = array_map(fn (string $meetingMode, int $index): array => $this->sessionData($meetingMode, $index), $meetingModes, array_keys($meetingModes));

        app(JadwalKelas::class)->create($courseClass, $sessions);

        $this->assertSame($meetingModes, $courseClass->sessions()->pluck('meeting_mode')->all());
        $this->assertDatabaseHas('class_sessions', [
            'course_class_id' => $courseClass->id,
            'sequence' => 1,
            'starts_at' => '2026-11-07 02:00:00',
        ]);
        $this->assertArrayNotHasKey('meeting_url', $courseClass->sessions()->first()->toArray());
    }

    public static function validModes(): array
    {
        return [
            'offline' => ['offline', ['offline', 'offline']],
            'online' => ['online', ['online', 'online']],
            'hybrid starting offline' => ['hybrid', ['offline', 'online', 'offline']],
            'hybrid starting online' => ['hybrid', ['online', 'offline']],
        ];
    }

    #[DataProvider('invalidSchedules')]
    public function test_rejects_invalid_schedule_without_saving_any_session(string $mode, array $sessions, string $errorKey, string $message): void
    {
        $courseClass = KelasKursus::factory()->create(['learning_mode' => $mode]);

        try {
            app(JadwalKelas::class)->create($courseClass, $sessions);
            $this->fail('Jadwal tidak valid seharusnya ditolak.');
        } catch (ValidationException $exception) {
            $this->assertSame($message, $exception->errors()[$errorKey][0]);
        }

        $this->assertDatabaseCount('class_sessions', 0);
    }

    public static function invalidSchedules(): array
    {
        $offline = ['meeting_mode' => 'offline', 'starts_at' => '2026-11-07 09:00:00', 'ends_at' => '2026-11-07 10:00:00', 'location' => 'Studio'];
        $online = ['meeting_mode' => 'online', 'starts_at' => '2026-11-14 09:00:00', 'ends_at' => '2026-11-14 10:00:00', 'meeting_url' => 'https://example.com/meeting'];

        return [
            'hybrid requires two sessions' => ['hybrid', [$offline], 'sessions', 'Kelas hybrid membutuhkan minimal dua sesi.'],
            'hybrid must alternate' => ['hybrid', [$offline, array_replace($offline, ['starts_at' => '2026-11-14 09:00:00', 'ends_at' => '2026-11-14 10:00:00'])], 'sessions.1.meeting_mode', 'Sesi hybrid harus bergantian offline dan online.'],
            'offline cannot contain online' => ['offline', [$online], 'sessions.0.meeting_mode', 'Jenis sesi harus sesuai model kelas.'],
            'online cannot contain offline' => ['online', [$offline], 'sessions.0.meeting_mode', 'Jenis sesi harus sesuai model kelas.'],
            'offline requires location' => ['offline', [array_replace($offline, ['location' => null])], 'sessions.0.location', 'Lokasi sesi offline wajib diisi.'],
            'online requires meeting link' => ['online', [array_replace($online, ['meeting_url' => null])], 'sessions.0.meeting_url', 'Tautan sesi online wajib diisi.'],
            'end must follow start' => ['offline', [array_replace($offline, ['ends_at' => '2026-11-07 08:00:00'])], 'sessions.0.starts_at', 'Sesi harus berurutan, tidak bertumpuk, dan memiliki waktu selesai setelah mulai.'],
            'sessions cannot overlap' => ['hybrid', [$offline, array_replace($online, ['starts_at' => '2026-11-07 09:30:00', 'ends_at' => '2026-11-07 10:30:00'])], 'sessions.1.starts_at', 'Sesi harus berurutan, tidak bertumpuk, dan memiliki waktu selesai setelah mulai.'],
        ];
    }

    public function test_rejects_second_schedule_without_overwriting_existing_sessions(): void
    {
        $courseClass = KelasKursus::factory()->create();
        app(JadwalKelas::class)->create($courseClass, [$this->sessionData('offline', 0)]);

        try {
            app(JadwalKelas::class)->create($courseClass, [$this->sessionData('offline', 1)]);
            $this->fail('Jadwal lama tidak boleh ditimpa.');
        } catch (ValidationException $exception) {
            $this->assertSame('Jadwal kelas sudah tersedia.', $exception->errors()['sessions'][0]);
        }

        $this->assertDatabaseCount('class_sessions', 1);
        $this->assertDatabaseHas('class_sessions', ['starts_at' => '2026-11-07 02:00:00']);
    }

    private function sessionData(string $mode, int $index): array
    {
        $day = 7 + $index * 7;

        return [
            'meeting_mode' => $mode,
            'starts_at' => sprintf('2026-11-%02d 09:00:00', $day),
            'ends_at' => sprintf('2026-11-%02d 10:00:00', $day),
            'location' => $mode === 'offline' ? 'Studio' : null,
            'meeting_url' => $mode === 'online' ? 'https://example.com/meeting' : null,
        ];
    }
}
