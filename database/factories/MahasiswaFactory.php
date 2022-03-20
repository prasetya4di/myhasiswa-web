<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
            'nim' => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'study_plan' => $this->faker->text(),
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
