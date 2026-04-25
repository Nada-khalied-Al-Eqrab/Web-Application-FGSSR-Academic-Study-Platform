<?php
/*
========================================
File: CreateStudentsTable.php (Migration)

Description:
This migration creates the "students" table in the database,
which stores student-specific information linked to users and diplomas.

Table Structure:
- user_id: foreign key referencing users table (student account)
- diploma_id: foreign key referencing diplomas table (enrolled diploma)
- courses_completed: number of courses the student has completed (default = 0)
- timestamps: created_at and updated_at fields

Relationships:
- Each student is linked to one user account
- Each student is enrolled in one diploma

Author:
Nada Khaled

Notes:
- Used to manage student academic data
- Tracks student progress through completed courses
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('diploma_id')
                ->constrained('diplomas')
                ->cascadeOnDelete();
            $table->integer('courses_completed')->default(0);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
