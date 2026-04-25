<?php
/*
========================================
File: UserSeeder.php

Description:
Seeds the database with default users
including admins, doctors, and students.

Author:
Nada Khaled

Notes:
- All passwords are hashed using Laravel Hash
- User roles: admin, doctor, student
- User states: active, inactive, disabled
========================================
*/
namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            //======================== admains ===============================
            [
                'id' => '1',
                'code' => '202600208',
                'name' => 'احمد سالم',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'admin',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '2',
                'code' => '202600207',
                'name' => 'كريم فتحى',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'admin',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '3',
                'code' => '202600206',
                'name' => 'نورة على',
                'phone' => '01024357647',
                'state' => 'inactive',
                'role' => 'admin',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '4',
                'code' => '202600205',
                'name' => 'ندى الصاوى',
                'phone' => '01024357647',
                'state' => 'disabled',
                'role' => 'admin',
                'password' => Hash::make('1234567890123')
            ],
            //======================== doctors ===============================
            [
                'id' => '5',
                'code' => '202700200',
                'name' => 'د/مريم عادل',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '6',
                'code' => '202700201',
                'name' => 'د/زينب عز',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '7',
                'code' => '202700202',
                'name' => 'أ.د/شهيرة عزيزى',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '8',
                'code' => '202700203',
                'name' => 'أ.د/ صلاح مهدى',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '9',
                'code' => '202700204',
                'name' => 'د/فاطمة الليثى',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '10',
                'code' => '202700205',
                'name' => 'د/مصطفى عزت',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '11',
                'code' => '202700206',
                'name' => 'د/ اشرف عبد المنعم',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '12',
                'code' => '202700207',
                'name' => 'د/ سارة سعد',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '13',
                'code' => '202700208',
                'name' => 'د/ احمد حمزة',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '14',
                'code' => '202700209',
                'name' => 'د/ايمان عونى ',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '15',
                'code' => '202700210',
                'name' => 'أ.د/ عبد الهادى نبيه',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '16',
                'code' => '202700211',
                'name' => 'أ.د/ لمياء فتوح',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '17',
                'code' => '202700212',
                'name' => 'أ.د / سوزان عبد الرحمن',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '18',
                'code' => '202700213',
                'name' => 'أ.د/نجلاء عصام',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '19',
                'code' => '202700214',
                'name' => 'أ/هايدى حامد',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '20',
                'code' => '202700215',
                'name' => 'أ/شهيرة محمد',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'doctor',
                'password' => Hash::make('1234567890123')
            ],
            //======================== students ===============================
            [
                'id' => '21',
                'code' => '202500208',
                'name' => 'ندى خالد ',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'student',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '22',
                'code' => '202500207',
                'name' => 'دينا صلاح',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'student',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '23',
                'code' => '202500206',
                'name' => 'كرستين مقبل',
                'phone' => '01024357647',
                'state' => 'active',
                'role' => 'student',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '24',
                'code' => '202500204',
                'name' => 'محمود مدحت',
                'phone' => '01024357647',
                'state' => 'inactive',
                'role' => 'student',
                'password' => Hash::make('1234567890123')
            ],
            [
                'id' => '25',
                'code' => '202500203',
                'name' => 'ابراهيم ايمن',
                'phone' => '01024357647',
                'state' => 'disabled',
                'role' => 'student',
                'password' => Hash::make('1234567890123')
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
