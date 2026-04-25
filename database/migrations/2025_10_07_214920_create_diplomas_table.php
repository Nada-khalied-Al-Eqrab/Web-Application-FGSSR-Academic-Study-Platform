<?php
/*
========================================
File: CreateDiplomasTable.php (Migration)

Description:
This migration creates the "diplomas" table in the database,
which stores information about different diploma programs.

Table Structure:
- code: unique identifier for each diploma (short and unique)
- name_ar: diploma name in Arabic
- name_en: diploma name in English
- description: optional detailed description of the diploma
- img: optional image path for the diploma
- timestamps: created_at and updated_at fields

Author:
Nada Khaled

Notes:
- Used to manage diploma programs in the system
- Supports multilingual data (Arabic & English)
- Description and image are optional fields
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
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name_ar', 255);
            $table->string('name_en', 255);
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomas');
    }
};
