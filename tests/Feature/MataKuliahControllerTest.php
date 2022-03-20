<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MataKuliahControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $nim = "";
    private Generator $faker;

    public function test_create_mata_kuliah_should_add_new_data_if_success()
    {
        $matkul = array(
            "kode_matkul" => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            "nama" => $this->faker->name(),
            "sks" => $this->faker->randomNumber(),
            "link_kelas" => $this->faker->url(),
            "nama_dosen" => $this->faker->name(),
            "hari_kuliah" => "Senin",
            "waktu_kuliah" => $this->faker->time(),
            "tanggal_mulai" => $this->faker->date(),
            "tanggal_selesai" => $this->faker->dateTimeBetween('+3 month', '+9 month')->format("Y-m-d")
        );
        $response = $this->post('/api/matkul', $matkul);

        $response->assertCreated();
        $this->assertDatabaseHas('mata_kuliah', $matkul);
    }

    public function test_edit_mata_kuliah_should_change_data_if_success()
    {
        $oldMatkul = MataKuliah::factory()->create();
        $matkul = array(
            "kode_matkul" => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            "nama" => $this->faker->name(),
            "sks" => $this->faker->randomNumber(),
            "link_kelas" => $this->faker->url(),
            "nama_dosen" => $this->faker->name(),
            "hari_kuliah" => "Senin",
            "waktu_kuliah" => $this->faker->time(),
            "tanggal_mulai" => $this->faker->date(),
            "tanggal_selesai" => $this->faker->dateTimeBetween('+3 month', '+9 month')->format("Y-m-d")
        );
        $response = $this->put('/api/matkul/' . $oldMatkul->kode_matkul, $matkul);

        $response->assertOk();
        $this->assertDatabaseHas('mata_kuliah', $matkul);
    }

    public function test_edit_mata_kuliah_should_return_404_if_kode_matkul_not_found()
    {
        $matkul = array(
            "kode_matkul" => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            "nama" => $this->faker->name(),
            "sks" => $this->faker->randomNumber(),
            "link_kelas" => $this->faker->url(),
            "nama_dosen" => $this->faker->name(),
            "hari_kuliah" => "Senin",
            "waktu_kuliah" => $this->faker->time(),
            "tanggal_mulai" => $this->faker->date(),
            "tanggal_selesai" => $this->faker->dateTimeBetween('+3 month', '+9 month')->format("Y-m-d")
        );
        $response = $this->put('/api/matkul/' . $this->faker->randomLetter(), $matkul);

        $response->assertNotFound();
    }

    public function test_index_mata_kuliah_should_return_all_matkul_from_logged_in_user()
    {
        $matkul = MataKuliah::factory()->count(5)->create();
        $response = $this->get('/api/matkul');

        $response->assertOk();
        $response->assertJsonCount(5, "data");
    }

    public function test_show_mata_kuliah_should_return_matkul_based_on_given_kode_matkul()
    {
        $matkul = MataKuliah::factory()->create();

        $response = $this->get('/api/matkul/' . $matkul->kode_matkul);

        $response->assertOk();
    }

    public function test_show_mata_kuliah_should_return_404_if_not_found()
    {
        $response = $this->get('/api/matkul/' . $this->faker->randomLetter());

        $response->assertNotFound();
    }

    public function test_soft_delete_mata_kuliah_should_return_success_message_if_success()
    {
        $matkul = MataKuliah::factory()->create();

        $response = $this->delete('/api/matkul/' . $matkul->kode_matkul);

        $response->assertOk();
        $this->assertSoftDeleted($matkul);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $mahasiswa = Mahasiswa::factory()->create();
        $this->nim = $mahasiswa->nim;
        $user = User::find($mahasiswa->users_id);
        $this->mahasiswa = $mahasiswa;
        Sanctum::actingAs(
            $user,
            ['*']
        );
    }
}
