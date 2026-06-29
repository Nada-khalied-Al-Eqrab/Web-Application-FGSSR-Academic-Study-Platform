<?php
/*
========================================
File: AdminSeeder.php

Description:
Seeds the database with initial admin
users and defines their roles as either
super admin or normal admin.

Author:
Nada Khaled

Notes:
- Links admin records with existing users
- Supports two admin types: super & normal
========================================
*/
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $admins = [
            [
                'id' => '1',
                'user_id' => '1',
                'type' => 'super',
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'type' => 'normal',
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'type' => 'normal',
            ],
            [
                'id' => '4',
                'user_id' => '4',
                'type' => 'normal',
            ],
         ];
               foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
