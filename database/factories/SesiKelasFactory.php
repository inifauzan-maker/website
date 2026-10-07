<?php

namespace Database\Factories;

use App\Models\KelasKursus;
use App\Models\SesiKelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SesiKelas>
 */
class SesiKelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_class_id' => KelasKursus::factory(),
            'sequence' => 1,
            'meeting_mode' => 'offline',
            'starts_at' => '2026-11-07 09:00:00',
            'ends_at' => '2026-11-07 10:00:00',
            'location' => 'Studio latihan',
            'meeting_url' => null,
        ];
    }
}
