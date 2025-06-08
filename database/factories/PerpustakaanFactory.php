<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perpustakaan>
 */
class PerpustakaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "jdl_buku" => fake()->word(),
            "pengarang" => fake()->name(),
            "penerbit" => fake()->company(),
            "harga" => fake()->numberBetween(1000,100000)
        ];
    }
}
