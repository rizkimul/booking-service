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
            'service_type_name' => 'Jenis Pelayanan '.mt_rand(1, 20),
            'service_type_description' => $this->faker->word(),
        ];
    }
}
