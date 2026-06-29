<?php
/*
========================================
File: CreateExamSchedulesTable.php (Migration)

Description:
This migration creates the "exame_schedules" table in the database,
which is used to manage and store exam scheduling information.

Table Structure:
- course_id: foreign key referencing the courses table
- exam_type: type of exam (e.g., midterm, final, quiz)
- day: day of the exam
- exam_date: specific date of the exam
- exam_time: time of the exam
- duration: duration of the exam in minutes
- exam_mode: mode of the exam (online/offline)
- exam_link: optional link for online exams
- timestamps: created_at and updated_at fields

Author:
Dina Salah

Notes:
- Linked with courses table using foreign key relationship
- Supports both online and offline exams
- Exam link is optional for virtual exams
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
        Schema::create('exame_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('exam_type');
            $table->string('day');
            $table->date('exam_date');
            $table->time('exam_time');
            $table->integer('duration');
            $table->string('exam_mode');
            $table->string('exam_link')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exame_schedules');
    }
};
