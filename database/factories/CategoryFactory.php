<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     // C'est dans cette fonction qu'on défini les observations fictives à remplir dans les factories
    public function definition()
    {
        return [
            //

            'name'=>$this->faker->sentence(rand(1,3), true)
        ];
    }
}
