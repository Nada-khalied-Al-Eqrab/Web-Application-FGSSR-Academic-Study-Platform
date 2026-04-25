<?php
/*
========================================
File: StudentSeeder.php

Description:
Seeds student records and links each
student to a user and a diploma.

Author:
Nada Khaled

Notes:
- Each student is associated with a user and a diploma
========================================
*/
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $students = [
            [
                'id' => '1',
                'user_id' => '21',
                'diploma_id' => '1',
            ],
            [
                'id' => '2',
                'user_id' => '22',
                'diploma_id' => '2',
            ],
            [
                'id' => '3',
                'user_id' => '23',
                'diploma_id' => '3',
            ],
            [
                'id' => '4',
                'user_id' => '24',
                'diploma_id' => '4',
            ],
            [
                'id' => '5',
                'user_id' => '25',
                'diploma_id' => '5',
            ],
         ];
               foreach ($students as $student) {
            Student::create($student);
        }
    }
}
