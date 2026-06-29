<?php
/*
========================================
File: CreateCourseDiplomaTable.php (Migration)

Description:
This migration creates the "course_diploma" pivot table,
which defines the relationship between courses and diplomas.

It also stores additional rules about each course inside a diploma,
such as type and prerequisites.

Table Structure:
- course_id: foreign key referencing courses table
- diploma_id: foreign key referencing diplomas table
- type: defines the category of the course within the diploma:
  (General Requirements, Major Field Requirements, Core Electives, Minor)
- prerequisite: optional field describing required prerequisite course(s)
- timestamps: created_at and updated_at fields

Relationships:
- Many-to-Many relationship between courses and diplomas
- Each relationship may include extra metadata (type, prerequisite)

Author:
Nada Khaled

Notes:
- Pivot table used to connect courses with diplomas
- Supports academic structure and course dependency rules
- Prerequisite is stored as string for flexibility
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
    Schema::create('course_diploma', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
        $table->foreignId('diploma_id')->constrained('diplomas')->onDelete('cascade');
        $table->enum('type', [
            'General Requirements',
            'Major Field Requirements',
            'Core Electives',
            'Minor'
        ]);
        $table->string('prerequisite')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_diploma');
    }
};
