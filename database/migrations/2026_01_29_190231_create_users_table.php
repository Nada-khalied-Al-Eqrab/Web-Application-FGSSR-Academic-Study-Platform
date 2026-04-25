<?php
/*
========================================
File: CreateUsersPasswordResetSessionsTables.php (Migration)

Description:
This migration creates the core authentication-related tables:
users, password_reset_tokens, and sessions.

1. users table:
- Stores user account information for admins, doctors, and students
- Includes personal data, authentication info, and account status

2. password_reset_tokens table:
- Stores tokens used for password reset functionality

3. sessions table:
- Stores user session data for authentication tracking

Users Table Structure:
- code: unique user identifier (max 9 characters)
- name: user full name (optional)
- phone: phone number (optional)
- image: profile image path (optional)
- state: account status (active, inactive, disabled)
- role: defines user type (admin, doctor, student)
- password: encrypted password
- remember_token: used for "remember me" functionality
- timestamps: created_at and updated_at fields

Author:
Nada Khaled

Notes:
- This is the core authentication structure of the system
- Supports multiple user roles
- Includes session and password reset management
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name')->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('image')->nullable();
            $table->enum('state', ['active', 'inactive', 'disabled'])
                ->default('inactive');
            $table->enum('role', ['admin', 'doctor', 'student']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
