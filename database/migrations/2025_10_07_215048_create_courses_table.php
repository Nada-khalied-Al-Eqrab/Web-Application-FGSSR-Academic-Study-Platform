<?php
/*
========================================
File: CreateCoursesTable.php (Migration)

Description:
This migration creates the "courses" table in the database,
which stores information about academic courses.

Table Structure:
- img: optional image for the course
- code: unique short code for the course (max 5 characters)
- name_ar: course name in Arabic
- name_en: course name in English
- language: programming or teaching language used in the course (optional)
- tools: tools or technologies related to the course (optional)
- description: optional detailed description of the course
- timestamps: created_at and updated_at fields

Author:
Nada Khaled

Notes:
- Supports multilingual course data (Arabic & English)
- Designed for flexible course information storage
- Some fields are optional to allow scalability
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('code', 5)->unique();
            $table->string('name_ar', 255);
            $table->string('name_en', 255);
            $table->string('language', 5)->nullable();
            $table->string('tools', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
