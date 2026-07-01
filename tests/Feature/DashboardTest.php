<?php
/*
========================================
File: DashboardTest.php

Description:
Feature tests for the dashboard routes.
Ensures authenticated users are redirected
to the correct dashboard based on their role.

Tests:
- Student dashboard redirection
- Doctor dashboard redirection
- Admin dashboard redirection
- Unauthorized role returns 403 response

Author:
Nada Khaled

Notes:
- Uses Laravel Feature Testing
- Requires authenticated users
- Uses RefreshDatabase trait
- Verifies role-based route redirection
========================================
*/
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_redirected_to_student_dashboard()
    {
        $user = User::factory()->create([
            'role' => 'student',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('student.dashboard'));
    }

    public function test_doctor_redirected_to_doctor_dashboard()
    {
        $user = User::factory()->create([
            'role' => 'doctor',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('doctor.dashboard'));
    }

    public function test_admin_redirected_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_unknown_role_returns_403()
    {
        $user = User::factory()->create([
            'role' => 'unknown',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(403);
    }
}
