<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->firstName(),
            'password' => 'Admin',
            'usertype' => 'Admin',
            'instansi' => 'Fakultas Teknik',
            'fullname' => $this->faker->lastName(),
            'remember_token' => Str::random(10),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
