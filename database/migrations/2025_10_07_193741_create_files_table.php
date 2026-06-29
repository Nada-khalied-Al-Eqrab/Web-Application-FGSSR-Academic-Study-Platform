<?php
/*
========================================
File: CreateJobsAndFailedJobsTables.php (Migration)

Description:
This migration creates the database tables used for
Laravel queue system and background job processing.

It defines three main tables:
- jobs: stores queued jobs waiting to be processed
- job_batches: manages grouped/batched jobs execution
- failed_jobs: stores jobs that failed during execution
  for debugging and retry purposes

Author:
Christin Mokbel

Notes:
- Used by Laravel Queue system
- Supports asynchronous/background processing
- Helps improve application performance by offloading tasks
- Failed jobs can be inspected and retried later
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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('file_link');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
