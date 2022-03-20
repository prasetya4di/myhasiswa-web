<?php

namespace Database\Factories;

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
        $user = auth()->user();
        return [
            "kode_matkul" => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            "mahasiswa_nim" => $user->mahasiswa->nim,
            "nama" => $this->faker->name(),
            "sks" => $this->faker->randomNumber(),
            "link_kelas" => $this->faker->url(),
            "nama_dosen" => $this->faker->name(),
            "hari_kuliah" => "Senin",
            "waktu_kuliah" => $this->faker->time(),
            "tanggal_mulai" => $this->faker->date(),
            "tanggal_selesai" => $this->faker->date()
        ];
    }
}
