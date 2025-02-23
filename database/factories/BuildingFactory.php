<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buildingname' => $this->faker->city(),
            'buildingdescription' => $this->faker->companySuffix(),
        ];
    }
}
