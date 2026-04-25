<?php
/*
========================================
File: CreateSearchTable.php (Migration)

Description:
This migration creates the "search" table in the database,
which is used to store search-related data.

Table Structure:
- name: stores the search keyword or search term
- timestamps: created_at and updated_at fields

Author:
Christin Mokbel

Notes:
- Used to track or store user search inputs
- Can be extended later to support advanced search history or analytics
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
        Schema::create('search', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search');
    }
};
