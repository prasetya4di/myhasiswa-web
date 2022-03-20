<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "mata_kuliah_kode_matkul" => MataKuliah::factory(),
            "tanggal" => $this->faker->date(),
            "note" => $this->faker->realText()
        ];
    }
}
