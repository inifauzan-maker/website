<?php

namespace Database\Factories;

use App\Models\Cabang;
use App\Models\KelasKursus;
use App\Models\ProgramKursus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KelasKursus>
 */
class KelasKursusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Cabang::factory(),
            'course_program_id' => ProgramKursus::factory(),
            'name' => 'Kelas Menggambar',
            'learning_mode' => 'offline',
            'capacity' => 10,
            'price_rupiah' => 250000,
            'is_published' => false,
        ];
    }
}
