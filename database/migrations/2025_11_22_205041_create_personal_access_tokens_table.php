<?php
/*
========================================
File: CreatePersonalAccessTokensTable.php (Migration)

Description:
This migration creates the "personal_access_tokens" table in the database,
which is used by Laravel Sanctum for API authentication.

Table Structure:
- tokenable: polymorphic relationship (supports multiple models)
- name: name/identifier of the token
- token: unique hashed token string (64 characters)
- abilities: optional permissions/abilities assigned to the token
- last_used_at: timestamp of last token usage
- expires_at: optional expiration time for the token
- timestamps: created_at and updated_at fields

Relationships:
- Polymorphic relation allows tokens to belong to different models (users, admins, etc.)


Notes:
- Used for API authentication via Laravel Sanctum
- Supports token-based authentication system
- Tokens can have limited abilities and expiration time
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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->text('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable()->index();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
