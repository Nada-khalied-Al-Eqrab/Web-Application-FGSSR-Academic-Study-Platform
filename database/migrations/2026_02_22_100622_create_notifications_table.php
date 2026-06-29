<?php
/*
========================================
File: CreateNotificationsTable.php (Migration)

Description:
This migration creates the "notifications" table in the database,
which is used to store system notifications for different models.

Table Structure:
- id: unique UUID identifier for each notification
- type: notification class/type
- notifiable: polymorphic relationship (user, admin, etc.)
- data: notification content stored as JSON/text
- read_at: timestamp indicating when the notification was read
- timestamps: created_at and updated_at fields

Relationships:
- Polymorphic relation allows notifications to belong to different models

Author:
Christin Mokbel

Notes:
- Used by Laravel notification system
- Supports multiple notifiable entities (users, admins, etc.)
- Helps track read/unread notifications
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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
