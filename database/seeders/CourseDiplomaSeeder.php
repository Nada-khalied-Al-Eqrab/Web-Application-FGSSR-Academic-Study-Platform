<?php
/*
========================================
File: CourseDiplomaSeeder.php

Description:
Seeds the database with the relationship
between courses and diplomas, including
course types (General Requirements,
Core Electives, Major Field Requirements)
and prerequisites for each diploma.

Author:
Nada Khaled

Notes:
- Assigns common courses to all diplomas
- Defines specific course-diploma mappings
- Includes prerequisite rules for course ordering
========================================
*/

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseDiploma;

class CourseDiplomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the list of common courses (General Requirements)
        // These courses are shared across all diplomas
        $commonCourses = [1, 2, 3, 4, 5];
        // Define all diploma IDs in the system
        $diplomas = [1, 2, 3, 4, 5];
        foreach ($diplomas as $diplomaId) {
            foreach ($commonCourses as $courseId) {
                // Assign each common course to each diploma
                // as a General Requirement with no prerequisites
                CourseDiploma::create([
                    'course_id' => $courseId,
                    'diploma_id' => $diplomaId,
                    'type' => 'General Requirements', // Core foundational course
                    'prerequisite' => null,
                ]);
            }
        }
        $courseDiplomas = [
            //////////////////////////////////////AS///////////////////////////////////////////
            ///AS503
            ['course_id' => 6, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'AS511'],
            ///AS506
            ['course_id' => 7, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS500'],
            ['course_id' => 7, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS500'],
            ['course_id' => 7, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'AS500'],
            ///AS508
            ['course_id' => 8, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS506'],
            ['course_id' => 8, 'diploma_id' => 3, 'type' => 'Minor', 'prerequisite' => 'AS500'],
            ///AS509
            ['course_id' => 9, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS500'],
            ['course_id' => 9, 'diploma_id' => 3, 'type' => 'Minor', 'prerequisite' => 'AS500'],
            ///AS511
            ['course_id' => 10, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS506'],
            ///AS517
            ['course_id' => 11, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'AS511'],
            ///AS521
            ['course_id' => 12, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'AS500'],
            ///AS528
            ['course_id' => 13, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'AS508'],
            //////////////////////////////////////OR///////////////////////////////////////////
            /// OR501
            ['course_id' => 14, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 14, 'diploma_id' => 6, 'type' => 'Minor', 'prerequisite' => null],
            ///OR502
            ['course_id' => 15, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 15, 'diploma_id' => 6, 'type' => 'Minor', 'prerequisite' => null],
            ///OR505
            ['course_id' => 16, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 16, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => 'OR500'],
            ['course_id' => 16, 'diploma_id' => 5, 'type' => 'Minor', 'prerequisite' => 'OR500'],
            ///OR506
            ['course_id' => 17, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 17, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 17, 'diploma_id' => 5, 'type' => 'Minor', 'prerequisite' => 'OR505'],
            ///OR507
            ['course_id' => 18, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 18, 'diploma_id' => 5, 'type' => 'Minor', 'prerequisite' => 'OR505'],
            ///OR508
            ['course_id' => 19, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 19, 'diploma_id' => 6, 'type' => 'Minor', 'prerequisite' => null],
            ['course_id' => 19, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 19, 'diploma_id' => 5, 'type' => 'Minor', 'prerequisite' => 'OR505'],
            ['course_id' => 19, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR509
            ['course_id' => 20, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => 'OR509'],
            ///OR511
            ['course_id' => 21, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 21, 'diploma_id' => 6, 'type' => 'Minor', 'prerequisite' => null],
            ['course_id' => 21, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR512
            ['course_id' => 22, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR513
            ['course_id' => 23, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 23, 'diploma_id' => 5, 'type' => 'Minor', 'prerequisite' => 'OR505'],
            ///OR514
            ['course_id' => 24, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR515
            ['course_id' => 25, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => 'OM500'],
            ['course_id' => 25, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 25, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ['course_id' => 25, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR516
            ['course_id' => 26, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OR526
            ['course_id' => 27, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => 'OR506 '],
            ///OR529
            ['course_id' => 28, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            //////////////////////////////////////MS///////////////////////////////////////////
            ///MS505
            ['course_id' => 29, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'MS500'],
            ///MS506
            ['course_id' => 30, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => 'M500'],
            ['course_id' => 30, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => 'M500'],
            ['course_id' => 30, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///MS507
            ['course_id' => 31, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS500'],
            ['course_id' => 31, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'MS500'],
            ['course_id' => 31, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ['course_id' => 31, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => 'MS500'],
            ///MS512
            ['course_id' => 32, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'MS524'],
            ///MS513
            ['course_id' => 33, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'MS527'],
            ///MS514
            ['course_id' => 34, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'MS507'],
            ['course_id' => 34, 'diploma_id' => 3, 'type' => 'Minor', 'prerequisite' => 'AS500'],
            ///MS517
            ['course_id' => 35, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'MS500'],
            ['course_id' => 35, 'diploma_id' => 3, 'type' => 'Minor', 'prerequisite' => 'AS511'],
            ['course_id' => 35, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'MS500'],
            ///MS518
            ['course_id' => 36, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'AS506'],
            ///MS521
            ['course_id' => 37, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///MS524
            ['course_id' => 38, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'MS514'],
            ['course_id' => 38, 'diploma_id' => 3, 'type' => 'Minor', 'prerequisite' => 'MS514'],
            ///MS527
            ['course_id' => 39, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'MS507'],
            ['course_id' => 39, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'MS507'],
            ['course_id' => 39, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ///////////////////////////////////////DB//////////////////////////////////////////
            ///DB501
            ['course_id' => 40, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 40, 'diploma_id' => 4, 'type' => 'Minor', 'prerequisite' => null],
            ///DB502
            ['course_id' => 41, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 41, 'diploma_id' => 4, 'type' => 'Minor', 'prerequisite' => null],
            ///DB503
            ['course_id' => 42, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 42, 'diploma_id' => 4, 'type' => 'Minor', 'prerequisite' => null],
            ///DB505
            ['course_id' => 43, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///DB506
            ['course_id' => 44, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => 'MS500'],
            ///DB507
            ['course_id' => 45, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => 'DB501 - DB502'],
            ///DB508
            ['course_id' => 46, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 46, 'diploma_id' => 4, 'type' => 'Minor', 'prerequisite' => null],
            ///DB509
            ['course_id' => 47, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => null],
            ///DB511
            ['course_id' => 48, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => 'DB500'],
            ///DB512
            ['course_id' => 49, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => 'DB507'],
            ///DB513
            ['course_id' => 50, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => null],
            ///DB514
            ['course_id' => 51, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => null],
            ///DB516
            ['course_id' => 52, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => 'DB507'],
            ///DB517
            ['course_id' => 53, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => null],
            ///DB518
            ['course_id' => 54, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => null],
            ///DB528
            ['course_id' => 55, 'diploma_id' => 4, 'type' => 'Core Electives', 'prerequisite' => 'DB508'],
            ///////////////////////////////////////IT//////////////////////////////////////////
            ///IT500
            ['course_id' => 56, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 56, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 56, 'diploma_id' => 2, 'type' => 'Minor', 'prerequisite' => null],
            ///IT501
            ['course_id' => 57, 'diploma_id' => 2, 'type' => 'Minor', 'prerequisite' => 'IS500/IT500'],
            ['course_id' => 57, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///IT502
            ['course_id' => 58, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'IS500/T500'],
            ///IT503
            ['course_id' => 59, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ['course_id' => 59, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ['course_id' => 59, 'diploma_id' => 2, 'type' => 'Minor', 'prerequisite' => 'IS500/IT500'],
            ['course_id' => 59, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'IS500/IT500'],
            ///IT504
            ['course_id' => 60, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'IS500/IT500'],
            ///IT505
            ['course_id' => 61, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS503'],
            ['course_id' => 61, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///IT508
            ['course_id' => 62, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT510
            ['course_id' => 63, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT511
            ['course_id' => 64, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'IS500/IT500'],
            ///IT512
            ['course_id' => 65, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT513
            ['course_id' => 66, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT514
            ['course_id' => 67, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT515
            ['course_id' => 68, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT516
            ['course_id' => 69, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT517
            ['course_id' => 70, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => null],
            ///IT518
            ['course_id' => 71, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'IS500/IT500'],
            ///IT519
            ['course_id' => 72, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'CS507'],
            ///IT521
            ['course_id' => 73, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'IS501/IT501'],
            ///////////////////////////////////////CS//////////////////////////////////////////
            ///CS503
            ['course_id' => 74, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 74, 'diploma_id' => 1, 'type' => 'Minor', 'prerequisite' => null],
            ['course_id' => 74, 'diploma_id' => 2, 'type' => 'Minor', 'prerequisite' => null],
            ['course_id' => 74, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///CS504
            ['course_id' => 75, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS500'],
            ///CS505
            ['course_id' => 76, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS503'],
            ['course_id' => 76, 'diploma_id' => 1, 'type' => 'Minor', 'prerequisite' => 'CS503'],
            ///CS506
            ['course_id' => 77, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS500'],
            ///CS507
            ['course_id' => 78, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS503'],
            ['course_id' => 78, 'diploma_id' => 1, 'type' => 'Minor', 'prerequisite' => 'CS503'],
            ['course_id' => 78, 'diploma_id' => 2, 'type' => 'Minor', 'prerequisite' => 'CS503'],
            ['course_id' => 78, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///CS508
            ['course_id' => 79, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS500'],
            ['course_id' => 79, 'diploma_id' => 1, 'type' => 'Minor', 'prerequisite' => 'CS500'],
            ///CS509
            ['course_id' => 80, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS503'],
            ['course_id' => 80, 'diploma_id' => 1, 'type' => 'Minor', 'prerequisite' => 'CS503'],
            ['course_id' => 80, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS500'],
            ///CS510
            ['course_id' => 81, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'CS500'],
            ///CS511
            ['course_id' => 82, 'diploma_id' => 5, 'type' => 'Core Electives', 'prerequisite' => null],
            ['course_id' => 82, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///CS512
            ['course_id' => 83, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS500'],
            ///CS513
            ['course_id' => 84, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS504'],
            ///CS514
            ['course_id' => 85, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'MS521'],
            ///CS515
            ['course_id' => 86, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///CS516
            ['course_id' => 87, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS500'],
            ///CS517
            ['course_id' => 88, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///CS518
            ['course_id' => 89, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///CS519
            ['course_id' => 90, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///CS520
            ['course_id' => 91, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///CS521
            ['course_id' => 92, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///CS522
            ['course_id' => 93, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///CS523
            ['course_id' => 94, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ['course_id' => 94, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS503'],
            ///CS526
            ['course_id' => 95, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => null],
            ///CS527
            ['course_id' => 96, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS507'],
            ///CS531
            ['course_id' => 97, 'diploma_id' => 1, 'type' => 'Core Electives', 'prerequisite' => 'CS500'],
            ///////////////////////////////////////EC//////////////////////////////////////////
            ///EC505
            ['course_id' => 98, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'AS500'],
            ///EC508
            ['course_id' => 99, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'EC505'],
            ///EC510
            ['course_id' => 100, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'EC505'],
            ///EC525
            ['course_id' => 101, 'diploma_id' => 3, 'type' => 'Core Electives', 'prerequisite' => 'EC505'],
            ///////////////////////////////////////IS//////////////////////////////////////////
            ///IS508
            ['course_id' => 102, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'IT502'],
            ///IS509
            ['course_id' => 103, 'diploma_id' => 2, 'type' => 'Core Electives', 'prerequisite' => 'IS500/IT500'],
            ///////////////////////////////////////OM//////////////////////////////////////////
            ///OM500
            ['course_id' => 104, 'diploma_id' => 6, 'type' => 'Major Field Requirements', 'prerequisite' => 'NO '],
            ['course_id' => 104, 'diploma_id' => 6, 'type' => 'Minor', 'prerequisite' => 'NO '],
            ///OM504
            ['course_id' => 105, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OM505
            ['course_id' => 106, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OM506
            ['course_id' => 107, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OM507
            ['course_id' => 108, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OM508
            ['course_id' => 109, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///OM509
            ['course_id' => 110, 'diploma_id' => 6, 'type' => 'Core Electives', 'prerequisite' => null],
            ///////////////////////////////////////PP//////////////////////////////////////////
            ///PP501
            ['course_id' => 111, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 111, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 111, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 111, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ['course_id' => 111, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => null],
            ///PP502
            ['course_id' => 112, 'diploma_id' => 1, 'type' => 'Major Field Requirements', 'prerequisite' => 'PP501'],
            ['course_id' => 112, 'diploma_id' => 2, 'type' => 'Major Field Requirements', 'prerequisite' => 'PP501'],
            ['course_id' => 112, 'diploma_id' => 3, 'type' => 'Major Field Requirements', 'prerequisite' => 'PP501'],
            ['course_id' => 112, 'diploma_id' => 4, 'type' => 'Major Field Requirements', 'prerequisite' => 'PP501'],
            ['course_id' => 112, 'diploma_id' => 5, 'type' => 'Major Field Requirements', 'prerequisite' => 'PP501'],
        ];
        foreach ($courseDiplomas as $cd) {
            CourseDiploma::create($cd);
        }
    }
}
