<?php
/*
========================================
File: CreateMessagesTable.php (Migration)

Description:
This migration creates the "messages" table in the database,
which is used to store messages exchanged within courses.

Table Structure:
- course_id: foreign key referencing courses table
- user_id: foreign key referencing users table (sender)
- message: content of the message
- timestamps: created_at and updated_at fields

Relationships:
- Each message belongs to a specific course
- Each message is sent by a user

Author:
Dina Salah

Notes:
- Used for communication or discussion inside courses
- Supports messaging between users within the same course
- Cascade delete ensures messages are removed if related data is deleted
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
