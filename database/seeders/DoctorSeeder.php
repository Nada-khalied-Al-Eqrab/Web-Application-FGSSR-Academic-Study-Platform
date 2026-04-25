<?php

/*
========================================
File: DoctorSeeder.php

Description:
Seeds doctor records and links each
doctor to a user and a place.

Author:
Nada Khaled

Notes:
- academic_degree values:
  teaching_assistant, assistant_lecturer,
  lecturer, associate_professor,
  professor, professor_emeritus

- department examples:
  Computer Science, Information Systems,
  Mathematical Statistics, etc.
========================================
*/
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $doctors = [
            [
                'id' => '1',
                'user_id' => '5',
                'place_id' => '1',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '2',
                'user_id' => '6',
                'place_id' => '2',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '3',
                'user_id' => '7',
                'place_id' => '2',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '4',
                'user_id' => '8',
                'place_id' => '3',
                'academic_degree' => 'lecturer',
                'department' => 'Mathematical Statistics',
            ],
            [
                'id' => '5',
                'user_id' => '9',
                'place_id' => '4',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '6',
                'user_id' => '10',
                'place_id' => '5',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '7',
                'user_id' => '11',
                'place_id' => '6',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '8',
                'user_id' => '12',
                'place_id' => '7',
                'academic_degree' => 'lecturer',
                'department' => 'Information Systems',
            ],
            [
                'id' => '9',
                'user_id' => '13',
                'place_id' => '8',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '10',
                'user_id' => '14',
                'place_id' => '1',
                'academic_degree' => 'lecturer',
                'department' => 'Mathematical Statistics',
            ],
            [
                'id' => '11',
                'user_id' => '15',
                'place_id' => '2',
                'academic_degree' => 'lecturer',
                'department' => 'Mathematical Statistics',
            ],
            [
                'id' => '12',
                'user_id' => '16',
                'place_id' => '3',
                'academic_degree' => 'lecturer',
                'department' => 'Mathematical Statistics',
            ],
            [
                'id' => '13',
                'user_id' => '17',
                'place_id' => '5',
                'academic_degree' => 'lecturer',
                'department' => 'Mathematical Statistics',
            ],
            [
                'id' => '14',
                'user_id' => '18',
                'place_id' => '6',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '15',
                'user_id' => '19',
                'place_id' => '7',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
            [
                'id' => '16',
                'user_id' => '20',
                'place_id' => '7',
                'academic_degree' => 'lecturer',
                'department' => 'Computer Science',
            ],
        ];
        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
