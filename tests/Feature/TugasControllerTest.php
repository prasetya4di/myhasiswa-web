<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Tugas;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TugasControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $nim = "";
    private Generator $faker;

    public function test_create_tugas_should_add_new_data_if_success()
    {
        $matkul = MataKuliah::factory()->create();
        $tugas = array(
            "kode_matkul_id" => $matkul->kode_matkul,
            "nama" => $this->faker->name(),
            "tanggal_pengumpulan" => $this->faker->date(),
            "link_pengumpulan" => $this->faker->url(),
            "status" => $this->faker->boolean()
        );
        $response = $this->post('/api/tugas', $tugas);

        $response->assertCreated();
        $tugas["status"] = 0;
        $this->assertDatabaseHas('tugas', $tugas);
    }

    public function test_edit_tugas_should_change_data_if_success()
    {
        $oldtugas = Tugas::factory()->create();
        $tugas = array(
            "kode_matkul_id" => $oldtugas->kode_matkul_id,
            "nama" => $this->faker->name(),
            "tanggal_pengumpulan" => $this->faker->date(),
            "link_pengumpulan" => $this->faker->url(),
            "status" => $this->faker->boolean()
        );
        $response = $this->put('/api/tugas/' . $oldtugas->id, $tugas);

        $response->assertOk();
        $tugas["status"] = $tugas["status"] ? 1 : 0;
        $this->assertDatabaseHas('tugas', $tugas);
    }

    public function test_edit_tugas_should_return_404_if_id_not_found()
    {
        $oldtugas = Tugas::factory()->create();
        $tugas = array(
            "kode_matkul_id" => $oldtugas->kode_matkul_id,
            "nama" => $this->faker->name(),
            "tanggal_pengumpulan" => $this->faker->date(),
            "link_pengumpulan" => $this->faker->url(),
            "status" => $this->faker->boolean()
        );
        $response = $this->put('/api/tugas/' . $this->faker->randomLetter(), $tugas);

        $response->assertNotFound();
    }

    public function test_index_tugas_should_return_all_tugas_from_logged_in_user()
    {
        Tugas::factory()->count(5)->create();
        $response = $this->get('/api/tugas');

        $response->assertOk();
    }

    public function test_show_tugas_should_return_tugas_based_on_given_id()
    {
        $tugas = Tugas::factory()->create();

        $response = $this->get('/api/tugas/' . $tugas->id);

        $response->assertOk();
    }

    public function test_show_tugas_should_return_404_if_not_found()
    {
        $response = $this->get('/api/tugas/' . $this->faker->randomLetter());

        $response->assertNotFound();
    }

    public function test_soft_delete_tugas_should_return_success_message_if_success()
    {
        $tugas = Tugas::factory()->create();

        $response = $this->delete('/api/tugas/' . $tugas->id);

        $response->assertOk();
        $this->assertDatabaseMissing('tugas', [
            'id' => $tugas->id
        ]);
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
