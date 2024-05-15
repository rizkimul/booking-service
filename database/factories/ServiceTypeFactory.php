<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_type_name' => $this->faker->stateAbbr(),
            'service_type_description' => $this->faker->state(),
        ];
    }
}
