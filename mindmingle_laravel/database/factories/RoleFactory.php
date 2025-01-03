<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//        'role_name' => fake(['student', 'instructor', 'admin']),
//            'role_slug' => fake(['student', 'instructor', 'admin']),
//            'role_desc' => Str::random(40),
        ];
    }
}
