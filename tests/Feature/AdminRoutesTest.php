<?php
/*
========================================
File: AdminRoutesTest.php

Description:
Feature tests for administrator routes.
Ensures only administrators can access
admin dashboard and protected pages.

Tests:
- Admin can access dashboard
- Student cannot access admin dashboard
- Doctor cannot access admin dashboard

Author:
Nada Khaled

Notes:
- Uses Laravel Feature Testing
- Tests role-based authorization
- Uses RefreshDatabase trait
- Verifies admin middleware functionality
========================================
*/
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)
                         ->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    public function test_student_cannot_access_admin_dashboard()
    {
        $student = User::factory()->create([
            'role' => 'student',
        ]);

        $response = $this->actingAs($student)
                         ->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    public function test_doctor_cannot_access_admin_dashboard()
    {
        $doctor = User::factory()->create([
            'role' => 'doctor',
        ]);

        $response = $this->actingAs($doctor)
                         ->get('/admin/dashboard');

        $response->assertStatus(403);
    }
}
