<?php

namespace Database\Factories;

use App\Models\ProgramKursus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProgramKursus>
 */
class ProgramKursusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Dasar Menggambar',
            'slug' => fake()->unique()->slug(),
            'description' => null,
            'minimum_age' => 6,
            'maximum_age' => 12,
        ];
    }
}
