<?php
/*
========================================
File: CreateCourseStudentTable.php (Migration)

Description:
This migration creates the "course_student" pivot table,
which defines the relationship between students and courses.

It is used to manage course enrollment for students.

Table Structure:
- student_id: foreign key referencing students table
- course_id: foreign key referencing courses table
- timestamps: created_at and updated_at fields

Constraints:
- Unique constraint on (student_id, course_id) to prevent duplicate enrollments

Relationships:
- Many-to-Many relationship between students and courses

Author:
Nada Khaled

Notes:
- Tracks which courses each student is enrolled in
- Prevents duplicate registrations for the same course
- Cascade delete ensures data consistency
========================================
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->unique(['student_id', 'course_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
