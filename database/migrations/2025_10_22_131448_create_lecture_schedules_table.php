<?php
/*
========================================
File: CreateLectureSchedulesTable.php (Migration)

Description:
This migration creates the "lecture_schedules" table in the database,
which is used to manage lecture scheduling information for courses.

Table Structure:
- course_id: foreign key referencing the courses table
- day: day of the lecture
- start_time: lecture start time
- end_time: lecture end time
- place_id: foreign key referencing the places table (location of lecture)
- timestamps: created_at and updated_at fields

Relationships:
- Each lecture is linked to a specific course
- Each lecture is assigned to a specific place (building/hall/floor)

Author:
Dina Salah

Notes:
- Uses foreign key constraints with cascade delete
- Ensures data consistency between courses, lectures, and places
- Designed for scheduling system inside the platform
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
        Schema::create('lecture_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('place_id')
                ->constrained('places')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lecture_schedules', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
        Schema::dropIfExists('lecture_schedules');
    }
};
