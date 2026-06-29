<?php
/*
========================================
File: UserFactory.php

Description:
Factory class used to generate fake User data
for testing and database seeding purposes.

This factory provides default values such as:
- Random user name
- Default hashed password
- Random remember token

Notes:
- Used with Laravel database factories and seeders
- Default password is "password" (hashed)
- Useful for testing, development, and dummy data generation
========================================
*/
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
