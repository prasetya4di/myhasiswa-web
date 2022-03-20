<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MahasiswaControllerTest extends TestCase
{
    use RefreshDatabase;

    private Mahasiswa $mahasiswa;
    private Generator $faker;

    public function test_edit_should_change_data_in_db_if_success()
    {
        $updatedMahasiswa = array(
            "name" => $this->faker->name(),
            "address" => $this->faker->address(),
            "birth_date" => $this->faker->date(),
            "gender" => $this->faker->randomElement(["M", "F"]),
            "study_plan" => $this->faker->randomLetter(),
            "phone_number" => $this->faker->phoneNumber()
        );
        $response = $this->put("/api/mahasiswa/{$this->mahasiswa->nim}", $updatedMahasiswa);
        $response->assertOk();
        $this->assertDatabaseHas('mahasiswa', $updatedMahasiswa);
    }

    public function test_show_should_return_matched_data_if_success_and_found()
    {
        $response = $this->get("/api/mahasiswa/{$this->mahasiswa->nim}");

        $response->assertOk();
    }

    public function test_show_should_return_404_if_mahasiswa_not_found()
    {
        $response = $this->get("/api/mahasiswa/{$this->faker->randomLetter()}");

        $response->assertNotFound();
    }

    public function test_delete_should_soft_delete_mahasiswa_data()
    {
        $this->delete("/api/mahasiswa/{$this->mahasiswa->nim}");

        $this->assertSoftDeleted($this->mahasiswa);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $mahasiswa = Mahasiswa::factory()->create();
        $user = User::find($mahasiswa->users_id);
        $this->mahasiswa = $mahasiswa;
        Sanctum::actingAs(
            $user,
            ['*']
        );
    }
}
