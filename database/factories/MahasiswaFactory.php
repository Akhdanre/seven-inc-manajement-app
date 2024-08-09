<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => fake()->numberBetween(1, 20),
            "kelas_id" => fake()->numberBetween(1, 2),
            "nim" => fake()->password(16, 16),
            "name" => fake()->name(),
            "birth_place" => fake()->text(10),
            "birth_date" => fake()->date(),
            "edit_status" => false
        ];
    }
}
