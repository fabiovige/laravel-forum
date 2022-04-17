<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->dateTimeBetween('2019-01-01','2022-02-28'),
        ];
    }
}
