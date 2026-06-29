<?php
/*
========================================
File: DiplomaSeeder.php

Description:
Seeds the database with diploma data
including codes, names (Arabic/English),
descriptions, and images.

Author:
Nada Khaled

Notes:
- Each diploma has Arabic and English names
- Images are stored in assets/images/diploma
========================================
*/
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diploma;

class DiplomaSeeder extends Seeder
{
    public function run(): void
    {
        $diplomas = [
            [
                'id' => '1',
                'code' => 'CS',
                'name_ar' => 'دبلوم علوم الحاسب',
                'name_en' => 'Computer Science Diploma',
                'description' => 'برنامج يهدف إلى تأهيل الطلاب بالمعارف والمهارات المتقدمة في مجالات البرمجة، نظم التشغيل، وهندسة البرمجيات، مع التركيز على تطبيقات الذكاء الاصطناعي وتحليل البيانات.',
                'img' => 'assets/images/diploma/d1.jpg',
            ],
            [
                'id' => '2',
                'code' => 'SIT',
                'name_ar' => 'دبلوم نظم و تكنولوجيا المعلومات',
                'name_en' => 'Information Systems and Technology Diploma',
                'description' => 'برنامج متخصص في تكنولوجيا المعلومات وإدارة النظم، يركز على تحليل وتصميم الأنظمة، وقواعد البيانات، وتطبيقات نظم المعلومات في المؤسسات.',
                'img' => 'assets/images/diploma/d2.jpg',
            ],
            [
                'id' => '3',
                'code' => 'STAT',
                'name_ar' => 'دبلوم الاحصاء',
                'name_en' => 'Statistics Diploma',
                'description' => 'برنامج أكاديمي يهدف إلى إكساب الطلاب الأسس النظرية والتطبيقية لعلم الإحصاء، مع التدريب على استخدام الأساليب الإحصائية الحديثة في مجالات متعددة.',
                'img' => 'assets/images/diploma/d3.jpg',
            ],
            [
                'id' => '4',
                'code' => 'BD',
                'name_ar' => 'دبلوم الاحصاء الحيوى و السكانى',
                'name_en' => 'Biostatistics and Demography Diploma',
                'description' => 'برنامج يجمع بين مبادئ الإحصاء والتطبيقات في مجالات الصحة العامة والدراسات السكانية، مع التركيز على تحليل البيانات الطبية والديموغرافية.',
                'img' => 'assets/images/diploma/d4.jpg',
            ],
            [
                'id' => '5',
                'code' => 'OR',
                'name_ar' => 'دبلوم بحوث العمليات',
                'name_en' => 'Operations Research Diploma',
                'description' => 'برنامج يركز على استخدام النماذج الرياضية وأساليب التحليل الكمي لدعم اتخاذ القرار وحل المشكلات في مجالات الأعمال والصناعة.',
                'img' => 'assets/images/diploma/d5.jpg',
            ],
            [
                'id' => '6',
                'code' => 'OM',
                'name_ar' => 'دبلوم ادارة العمليات',
                'name_en' => 'Operations Management Diploma',
                'description' => 'برنامج متخصص في إدارة وتخطيط وتشغيل العمليات داخل المؤسسات، يدمج بين الأساليب الإدارية والكمية لتحسين الكفاءة والإنتاجية.',
                'img' => 'assets/images/diploma/d6.jpg',
            ],
        ];
        foreach ($diplomas as $diploma) {
            Diploma::create($diploma);
        }
    }
}
