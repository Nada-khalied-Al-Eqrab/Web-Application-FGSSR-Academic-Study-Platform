<?php
/*
========================================
File: CreateMaterialsSchedulesTable.php (Migration)

Description:
This migration creates the "materials_schedules" table in the database,
which is used to store learning materials and resources for each course.

Table Structure:
- course_id: foreign key referencing the courses table (unique per course)
- files_link: optional link to course files or documents
- videos_link: optional link to video resources
- online_link: optional link for online learning or sessions
- description: optional detailed description of the course materials
- timestamps: created_at and updated_at fields

Relationships:
- Each course has one materials schedule (one-to-one relationship)

Author:
Dina Salah

Notes:
- Ensures each course has only one materials record (unique constraint)
- Designed to centralize all learning resources for a course
- Supports files, videos, and online links together
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
        Schema::create('materials_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                ->unique()
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->string('files_link')->nullable();
            $table->string('videos_link')->nullable();
            $table->string('online_link')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials_schedules');
    }
};
