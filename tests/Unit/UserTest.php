<?php
/*
========================================
File: UserTest.php

Description:
Feature tests for general user routes.
Verifies home page accessibility and
role-based user redirection.

Tests:
- Home page loads successfully
- Authenticated user is redirected by role
- Guest cannot access protected routes

Author:
Nada Khaled

Notes:
- Uses Laravel Feature Testing
- Uses RefreshDatabase trait
- Tests authentication and route protection
========================================
*/
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_redirect_by_role()
    {
        $user = User::factory()->create([
            'role' => 'student',
        ]);

        $response = $this->actingAs($user)
                         ->get('/redirect-by-role');

        $response->assertRedirect(route('student.dashboard'));
    }

    public function test_guest_cannot_access_redirect_by_role()
    {
        $response = $this->get('/redirect-by-role');

        $response->assertRedirect('/login');
    }
}
