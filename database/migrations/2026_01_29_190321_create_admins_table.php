<?php
/*
========================================
File: CreateAdminsTable.php (Migration)

Description:
This migration creates the "admins" table in the database,
which stores administrator roles and permissions.

Table Structure:
- user_id: foreign key referencing users table (admin linked to a user)
- type: defines admin level (super, normal)
- timestamps: created_at and updated_at fields

Relationships:
- Each admin is associated with a user account

Author:
Nada Khaled

Notes:
- Used to distinguish admin users from other roles
- Supports multiple admin levels (super admin & normal admin)
- Cascade delete ensures admin is removed if user is deleted
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->enum('type', ['super', 'normal'])
                ->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
