<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "kode_matkul_id" => MataKuliah::factory(),
            "nama" => $this->faker->name(),
            "tanggal_pengumpulan" => $this->faker->date(),
            "link_pengumpulan" => $this->faker->url(),
            "status" => $this->faker->boolean()
        ];
    }
}
