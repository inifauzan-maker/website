<?php

namespace Database\Factories;

use App\Models\KelasKursus;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pendaftaran>
 */
class PendaftaranFactory extends Factory
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
            'child_name' => fake()->firstName(),
            'child_age' => 8,
            'parent_name' => fake()->name(),
            'parent_phone' => '081234567890',
            'parent_email' => fake()->safeEmail(),
        ];
    }
}
