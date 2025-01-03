<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseMasterclassLevel>
 */
class CourseMasterclassLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'masterclass_level_name' => fake()->userName(),
            'masterclass_level_slug' => fake()->slug()
        ];
    }
}
