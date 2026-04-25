<?php
/*
========================================
File: CreateDoctorsTable.php (Migration)

Description:
This migration creates the "doctors" table in the database,
which stores academic staff (doctors) information.

Table Structure:
- user_id: foreign key referencing users table (doctor belongs to a user account)
- academic_degree: academic rank of the doctor
- department: department the doctor belongs to
- place_id: optional foreign key referencing places table (office location)
- office_hours_from: start time of office hours (optional)
- office_hours_to: end time of office hours (optional)
- timestamps: created_at and updated_at fields

Relationships:
- Each doctor is linked to one user
- Each doctor may be assigned to one place (optional)

Author:
Nada Khaled

Notes:
- Supports structured academic hierarchy
- Department is predefined using enum for consistency
- Office location and hours are optional fields
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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->enum('academic_degree', [
                'teaching_assistant',
                'assistant_lecturer',
                'lecturer',
                'associate_professor',
                'professor',
                'professor_emeritus'
            ]);
            $table->enum('department', [
                'Statistics',
                'Mathematical Statistics',
                'Biostatistics and Demography',
                'Information Systems',
                'Computer Science',
                'Operations Research',
                'Operations Management',
                'Data Science',
                'Software Engineering'
            ]);
            $table->foreignId('place_id')
                ->nullable()
                ->constrained('places')
                ->nullOnDelete();
            $table->time('office_hours_from')->nullable();
            $table->time('office_hours_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
