<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CarFactory extends Factory
{

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->company,
            'model' => Str::random(10),
            'year' => $this->faker->year,
            'price' => $this->faker->randomDigit(),
            'color' => $this->faker->colorName,
        ];
    }
}
