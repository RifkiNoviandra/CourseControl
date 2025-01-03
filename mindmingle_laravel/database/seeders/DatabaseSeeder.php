<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use App\Models\Role;
use App\Models\User;
use Database\Factories\CourseCategoryFactory;
use Database\Factories\MasterClassFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        \App\Models\Role::factory()->create([
            'role_name' => 'Admin',
            'role_slug' => ucfirst(Str::slug('admin')),
            'role_description' => fake()->text,
        ]);

        \App\Models\Role::factory()->create([
            'role_name' => 'Student',
            'role_slug' => ucfirst(Str::slug('student')),
            'role_description' => fake()->text,
        ]);

        \App\Models\Role::factory()->create([
            'role_name' => 'Instructor',
            'role_slug' => ucfirst(Str::slug('instructor')),
            'role_description' => fake()->text,
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Web Development',
            'category_slug' => Str::slug('Web Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Data Science',
            'category_slug' => Str::slug('Data Science'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Android Development',
            'category_slug' => Str::slug('Andoird Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'IOS Development',
            'category_slug' => Str::slug('IOS Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'DevOps Development',
            'category_slug' => Str::slug('DevOps Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Desktop Development',
            'category_slug' => Str::slug('Desktop Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Game Development',
            'category_slug' => Str::slug('Game Development'),
        ]);

        \App\Models\CourseCategory::factory()->create([
            'category_name' => 'Machine Learning',
            'category_slug' => Str::slug('Machine Learning'),
        ]);


        \App\Models\CourseMasterclassLevel::factory()->create([
            'masterclass_level_name' => 'All Level',
            'masterclass_level_slug' => Str::slug('All'),
        ]);

        \App\Models\CourseMasterclassLevel::factory()->create([
            'masterclass_level_name' => 'Advance',
            'masterclass_level_slug' => Str::slug('Advance'),
        ]);

        \App\Models\CourseMasterclassLevel::factory()->create([
            'masterclass_level_name' => 'Beginner',
            'masterclass_level_slug' => Str::slug('Beginner'),
        ]);

        \App\Models\CourseMasterclassLevel::factory()->create([
            'masterclass_level_name' => 'Intermediate',
            'masterclass_level_slug' => Str::slug('Intermediate'),
        ]);

        \App\Models\CourseMasterclassLevel::factory()->create([
            'masterclass_level_name' => 'Master',
            'masterclass_level_slug' => Str::slug('Master'),
        ]);


        \App\Models\CoursePriceType::factory()->create([
            'price_type_name' => 'Free',
            'price_type_slug' => Str::slug('Free'),
        ]);

        \App\Models\CoursePriceType::factory()->create([
            'price_type_name' => 'Paid',
            'price_type_slug' => Str::slug('Paid'),
        ]);

        \App\Models\CourseClassType::factory()->create([
            'class_type_name' => 'Masterclass',
            'class_type_slug' => Str::slug('masterclass'),
        ]);

        \App\Models\CourseClassType::factory()->create([
            'class_type_name' => 'Video On-Demand',
            'class_type_slug' => Str::slug('video on-demand'),
        ]);


        User::factory()->count(50)->create();
        User::factory()->create([
            'role_id' => 1,
            'full_name' => 'Administrator',
            'email' => 'admin@administrator.com',
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 'active',
            'is_email_verified' => true
        ]);

        User::factory()->create([
            'role_id' => 2,
            'full_name' => 'User',
            'email' => 'user@test.com',
            'username' => 'userData',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 'active',
            'is_email_verified' => true
        ]);
    }
}
