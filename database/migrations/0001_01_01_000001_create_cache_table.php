<?php
/*
========================================
File: CreateCacheTables.php (Migration)

Description:
This migration creates the database tables required
for Laravel caching system.

It defines two tables:
- cache: stores cached data (key, value, expiration time)
- cache_locks: handles cache locking mechanism
  to prevent race conditions in concurrent processes

Notes:
- These tables are used by Laravel cache drivers
- Useful for improving application performance
- Safe to use with file/database/redis cache systems
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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
