<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "kode_matkul" => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            "nim_id" => Mahasiswa::factory(),
            "nama" => $this->faker->randomLetter(),
            "sks" => $this->faker->randomNumber(),
            "link_kelas" => $this->faker->randomLetter(),
            "nama_dosen" => $this->faker->randomLetter(),
            "hari_kuliah" => "Senin",
            "waktu_kuliah" => $this->faker->time(),
            "tanggal_mulai" => $this->faker->date(),
            "tanggal_selesai" => $this->faker->date()
        ];
    }
}
