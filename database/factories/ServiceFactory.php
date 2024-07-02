<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_type_id' => mt_rand(1,20),
            'field_id' => mt_rand(1,20),
            'service_name' => 'Pelayanan '.mt_rand(1,100),
            'service_description' => $this->faker->word(),
        ];
    }
}
