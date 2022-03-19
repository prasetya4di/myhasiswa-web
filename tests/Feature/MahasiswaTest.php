<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;

    private string $token = "";
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
        $response = $this
            ->withHeader("token", $this->token)
            ->post("/api/mahasiswa/{$this->mahasiswa->nim}", $updatedMahasiswa);

        $response->assertOk();
        $this->assertDatabaseHas('mahasiswa', $updatedMahasiswa);
    }

    public function test_show_should_return_matched_data_if_success_and_found()
    {
        $response = $this
            ->withHeader("token", $this->token)
            ->get("/api/mahasiswa/{$this->mahasiswa->nim}");

        $response->assertOk();
    }

    public function test_show_should_return_404_if_mahasiswa_not_found()
    {
        $response = $this
            ->withHeader("token", $this->token)
            ->get("/api/mahasiswa/{$this->faker->randomLetter()}");

        $response->assertNotFound();
    }

    public function test_delete_should_soft_delete_mahasiswa_data()
    {
        $response = $this
            ->withHeader("token", $this->token)
            ->delete("/api/mahasiswa/{$this->mahasiswa->nim}");

        $this->assertSoftDeleted($this->mahasiswa);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $mahasiswa = Mahasiswa::factory()->create();
        $user = User::where('id', $mahasiswa->users_id)->firstOrFail();
        $this->email = $user->email;
        $token = $user->createToken('auth_token')->plainTextToken;
        $this->token = "Bearer $token";
        $this->mahasiswa = $mahasiswa;
        $this->faker = Factory::create();
    }
}
