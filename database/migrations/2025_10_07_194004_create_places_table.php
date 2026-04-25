<?php
/*
========================================
File: CreatePlacesTable.php (Migration)

Description:
This migration creates the "places" table in the database,
which stores information about physical locations such as
buildings, halls, and floors.

Table Structure:
- build_name: name of the building
- hall_name: name/number of the hall
- floor: floor level of the place
- timestamps: created_at and updated_at fields

Author:
Christin Mokbel

Notes:
- Used to organize and manage location data inside the system
- Helps in assigning lectures, rooms, or events to specific places
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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('build_name');
            $table->string('hall_name');
            $table->string('floor');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
