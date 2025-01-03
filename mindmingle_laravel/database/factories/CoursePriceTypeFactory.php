<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoursePriceType>
 */
class CoursePriceTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price_type_name' => fake()->userName(),
            'price_type_slug' => ucfirst(Str::slug(fake()->unique()->userName()))
        ];
    }
}
