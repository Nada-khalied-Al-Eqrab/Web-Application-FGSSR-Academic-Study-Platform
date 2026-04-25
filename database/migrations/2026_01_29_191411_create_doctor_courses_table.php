<?php
/*
========================================
File: CreateDoctorCoursesTable.php (Migration)

Description:
This migration creates the "doctor_courses" pivot table,
which defines the relationship between doctors and courses.

It is used to assign courses to doctors.

Table Structure:
- doctor_id: foreign key referencing doctors table
- course_id: foreign key referencing courses table
- timestamps: created_at and updated_at fields

Constraints:
- Unique constraint on (doctor_id, course_id) to prevent duplicate assignments

Relationships:
- Many-to-Many relationship between doctors and courses

Author:
Nada Khaled

Notes:
- Ensures each doctor is assigned to a course only once
- Used for managing teaching assignments
- Cascade delete maintains data consistency
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
        Schema::create('doctor_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')
                ->constrained('doctors')
                ->cascadeOnDelete();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->unique(['doctor_id', 'course_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_courses');
    }
};
