<?php
/*
========================================
File: CourseTest.php

Description:
Feature tests for course management routes.
Verifies course pages, viewing, and
course creation functionality.

Tests:
- Courses page loads successfully
- View a single course
- Create a new course

Author:
Nada Khaled

Notes:
- Uses Laravel Feature Testing
- Uses Course Factory
- Uses RefreshDatabase trait
- Verifies database changes after creation
========================================
*/
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_courses_page_loads()
    {
        $response = $this->get('/courses');

        $response->assertStatus(200);
    }

    public function test_single_course_can_be_viewed()
    {
        $course = Course::factory()->create();

        $response = $this->get("/courses/{$course->id}");

        $response->assertStatus(200);
    }

    public function test_create_course()
    {
        $response = $this->post('/courses/store', [
            'name' => 'Laravel',
            'code' => 'CS101',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('courses', [
            'name' => 'Laravel',
        ]);
    }
}
