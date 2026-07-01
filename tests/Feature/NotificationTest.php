<?php
/*
========================================
File: NotificationTest.php

Description:
Feature tests for the notification system.
Verifies authentication and access to
notification routes.

Tests:
- Guest cannot access notifications
- Authenticated user can access notifications

Author:
Nada Khaled

Notes:
- Uses Laravel Feature Testing
- Requires authentication middleware
- Uses RefreshDatabase trait
- Ensures notification routes are protected
========================================
*/
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_notifications()
    {
        $response = $this->get('/notifications');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_notifications()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('/notifications');

        $response->assertStatus(200);
    }
}
