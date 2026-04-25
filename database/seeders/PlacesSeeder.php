<?php
/*
========================================
File: PlacesSeeder.php

Description:
Seeds the database with places data
including buildings, halls, and floors.

Author:
Christin Mokbel

Notes:
- Each place includes building name, hall name, and floor
========================================
*/
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places =[
            [
                'id' => '1',
                'build_name' => "مبنى عبد المنعم الشافعى   " ,
                'hall_name' =>"مدرج عبد المنعم الشافعى ",
                'floor' =>"الدور الارضي ",
            ],
             [
                'id' => '2',
                'build_name' => "مبنى عبد المنعم الشافعى   " ,
                'hall_name' =>"المدرج الكبير  ",
                'floor' =>"الدور الثانى  ",
            ],
             [
                'id' => '3',
                'build_name' => "مبنى عبد المنعم الشافعى   " ,
                'hall_name' =>"صالة ب   ",
                'floor' =>"الدور الارضى امام مدرج عبد المنعم الشافعى   ",
            ],
             [
                'id' => '4',
                'build_name' => "مبنى عبد المنعم الشافعى   " ,
                'hall_name' =>"صالة أ  ",
                'floor' =>"الدور الثانى امام المدرج الكبير  ",
            ],
             [
                'id' => '5',
                'build_name' => "المبنى الرئيسي   " ,
                'hall_name' =>"المدرج 7  ",
                'floor' =>"الدور الثالث  ",
            ],
             [
                'id' => '6',
                'build_name' => "المبنى الرئيسي   " ,
                'hall_name' =>"المدرج 8  ",
                'floor' =>"الدور الثالث  ",
            ],
             [
                'id' => '7',
                'build_name' => "المبنى الرئيسي   " ,
                'hall_name' =>"المدرج 9  ",
                'floor' =>"الدور الرابع  ",
            ],
             [
                'id' => '8',
                'build_name' => "المبنى الرئيسي   " ,
                'hall_name' =>"المدرج 10  ",
                'floor' =>"الدور الرابع  ",
            ],
            ];
        foreach ($places as $place) {
            Place::create($place);
        }
    }
}
