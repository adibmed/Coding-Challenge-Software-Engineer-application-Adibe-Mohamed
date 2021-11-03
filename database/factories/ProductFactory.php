<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(1, 5), $asText = true),
            'description' => $this->faker->paragraph(2, true),
            'price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
            'image' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
