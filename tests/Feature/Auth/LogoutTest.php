<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    private string $email = "";
    private string $token = "";
    private Generator $faker;

    public function test_logout_should_delete_token_in_db_when_success()
    {
        $response = $this->withHeader("token", "Bearer $this->token")->post('/api/logout');

        $response->assertStatus(302);
        $this->assertDatabaseMissing('personal_access_tokens', [
            "token" => $this->token
        ]);
    }

    public function test_logout_should_return_302_if_user_hasnt_login_yet()
    {
        $response = $this->post('/api/logout');

        $response->assertStatus(302);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $mahasiswa = Mahasiswa::factory()->create();
        $user = User::where('id', $mahasiswa->users_id)->firstOrFail();
        $this->email = $user->email;
        $token = $user->createToken('auth_token')->plainTextToken;
        $this->token = $token;
        $this->faker = Factory::create();
    }
}
