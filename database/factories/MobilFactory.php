<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipe = ["Bus","Sedan", "Mini Bus","Hatchback","SUV"];
        $merek = ["Avanza","Inova","Jazz", "Hiace","Fortuner"];
        return [
            "nama" => $merek[rand(0,4)],
            "warna" => fake()->colorName(),
            "tahun" => fake()->year(),
            "is_avaliable" => rand(0,1),
            "tipe" => $tipe[rand(0,4)],
            "harga_lepas_kunci" => rand(200000,350000),
            "harga_dengan_supir" => rand(400000,500000),
        ];
    }
}
