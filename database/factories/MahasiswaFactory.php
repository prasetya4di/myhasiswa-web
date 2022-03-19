<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->randomLetter(),
            'users_id' => User::factory(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'study_plan' => $this->faker->randomLetter(),
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
