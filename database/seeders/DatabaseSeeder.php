<?php
/*
==================================================
Project: Graduation Project - Archive System
File: DatabaseSeeder.php

Description:
This file is responsible for seeding the database
with initial data such as users, courses, diplomas,
and system roles.

Team Contributions:
- Nada Khaled Said Ibrahim:
  DiplomaSeeder, CourseSeeder, CourseDiplomaSeeder,
  UserSeeder, AdminSeeder, StudentSeeder, DoctorSeeder

- Christin Mokbel Elias Eskaros:
  PlacesSeeder

Run Instructions (Quick Steps):
1. Configure database in .env file
2. Run migrations:
   php artisan migrate
3. Run seeders:
   php artisan db:seed

For more details, check README.md

Last Updated: 2026
==================================================
*/

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call all seeders to populate the database
        $this->call([
            // Locations / Places Data
            PlacesSeeder::class,
            // Academic Structure
            DiplomaSeeder::class,
            CourseSeeder::class,
            CourseDiplomaSeeder::class,
            // System Users
            UserSeeder::class,
            AdminSeeder::class,
            StudentSeeder::class,
            DoctorSeeder::class,
        ]);
    }
}
