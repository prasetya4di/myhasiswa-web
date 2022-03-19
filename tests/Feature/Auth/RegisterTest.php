<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_should_add_new_users_and_mahasiswa_if_success()
    {
        $faker = Factory::create();
        $user = array(
            'email' => $faker->email(),
            'password' => $faker->password(minLength: 8),
        );
        $mahasiswa = array(
            'nim' => $faker->randomLetter(),
            'name' => $faker->name(),
            'address' => $faker->address(),
            'birth_date' => $faker->date(),
            'gender' => $faker->randomElement(['m', 'f']),
            'study_plan' => $faker->randomLetter(),
            'phone_number' => $faker->phoneNumber()
        );
        $response = $this->post('/api/register', array_merge($user, $mahasiswa));

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => $user['email']
        ]);
        $this->assertDatabaseHas('mahasiswa', $mahasiswa);
    }
}
