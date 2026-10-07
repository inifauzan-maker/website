<?php

namespace App;

use App\Models\KelasKursus;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class JadwalKelas
{
    /**
     * Input dates use Asia/Jakarta; persisted dates use UTC.
     *
     * @param  array<int, array{meeting_mode: string, starts_at: string, ends_at: string, location?: string|null, meeting_url?: string|null}>  $sessions
     */
    public function create(KelasKursus $courseClass, array $sessions): void
    {
        $validated = Validator::make(['sessions' => $sessions], [
            'sessions' => ['required', 'array', 'list', 'min:1', 'max:100'],
            'sessions.*' => ['required', 'array:meeting_mode,starts_at,ends_at,location,meeting_url'],
            'sessions.*.meeting_mode' => ['required', Rule::in(['offline', 'online'])],
            'sessions.*.starts_at' => ['required', 'date_format:Y-m-d H:i:s'],
            'sessions.*.ends_at' => ['required', 'date_format:Y-m-d H:i:s'],
            'sessions.*.location' => ['nullable', 'string', 'max:255'],
            'sessions.*.meeting_url' => ['nullable', 'url:http,https', 'max:2048'],
        ])->validate();

        DB::transaction(function () use ($courseClass, $validated): void {
            $lockedClass = KelasKursus::query()->lockForUpdate()->findOrFail($courseClass->getKey());

            if ($lockedClass->sessions()->exists()) {
                throw ValidationException::withMessages(['sessions' => 'Jadwal kelas sudah tersedia.']);
            }

            $sessions = $validated['sessions'];

            if ($lockedClass->learning_mode === 'hybrid' && count($sessions) < 2) {
                throw ValidationException::withMessages(['sessions' => 'Kelas hybrid membutuhkan minimal dua sesi.']);
            }

            $previousMode = null;
            $previousEnd = null;
            $records = [];

            foreach ($sessions as $index => $session) {
                $mode = $session['meeting_mode'];
                $start = CarbonImmutable::parse($session['starts_at'], 'Asia/Jakarta');
                $end = CarbonImmutable::parse($session['ends_at'], 'Asia/Jakarta');

                if ($lockedClass->learning_mode !== 'hybrid' && $mode !== $lockedClass->learning_mode) {
                    throw ValidationException::withMessages(["sessions.$index.meeting_mode" => 'Jenis sesi harus sesuai model kelas.']);
                }

                if ($lockedClass->learning_mode === 'hybrid' && $mode === $previousMode) {
                    throw ValidationException::withMessages(["sessions.$index.meeting_mode" => 'Sesi hybrid harus bergantian offline dan online.']);
                }

                if ($end->lessThanOrEqualTo($start) || ($previousEnd !== null && $start->lessThan($previousEnd))) {
                    throw ValidationException::withMessages(["sessions.$index.starts_at" => 'Sesi harus berurutan, tidak bertumpuk, dan memiliki waktu selesai setelah mulai.']);
                }

                $requiredField = $mode === 'offline' ? 'location' : 'meeting_url';

                if (blank($session[$requiredField] ?? null)) {
                    throw ValidationException::withMessages(["sessions.$index.$requiredField" => $mode === 'offline' ? 'Lokasi sesi offline wajib diisi.' : 'Tautan sesi online wajib diisi.']);
                }

                $records[] = [
                    'sequence' => $index + 1,
                    'meeting_mode' => $mode,
                    'starts_at' => $start->utc(),
                    'ends_at' => $end->utc(),
                    'location' => $mode === 'offline' ? $session['location'] : null,
                    'meeting_url' => $mode === 'online' ? $session['meeting_url'] : null,
                ];
                $previousMode = $mode;
                $previousEnd = $end;
            }

            $lockedClass->sessions()->createMany($records);
        });
    }
}
