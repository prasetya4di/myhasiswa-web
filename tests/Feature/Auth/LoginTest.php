<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private string $email = "";
    private string $password = "password";
    private Generator $faker;

    public function test_login_should_success_if_email_and_password_is_correct()
    {
        $response = $this->post('/api/login', [
            'email' => $this->email,
            'password' => $this->password
        ]);

        $response->assertStatus(200);
    }

    public function test_login_should_return_error_code_401_when_email_or_password_incorrect()
    {
        $response = $this->post('/api/login', [
            'email' => $this->faker->email(),
            'password' => $this->faker->password
        ]);

        $response->assertStatus(401)->assertJson(['message' => 'Unauthorized']);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $mahasiswa = Mahasiswa::factory()->create();
        $user = User::where('id', $mahasiswa->users_id)->firstOrFail();
        $this->email = $user->email;
        $this->faker = Factory::create();
    }
}
