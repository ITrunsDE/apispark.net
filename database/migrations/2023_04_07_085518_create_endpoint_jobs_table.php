<?php

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
        Schema::create('endpoint_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('repository_id');
            $table->unsignedBigInteger('endpoint_id');
            $table->unsignedBigInteger('interval_id');
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->datetime('last_run')->nullable();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('endpoint_id')->on('endpoints')->references('id')->cascadeOnDelete();
            $table->foreign('repository_id')->on('repositories')->references('id')->cascadeOnDelete();
            $table->foreign('interval_id')->on('intervals')->references('id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endpoint_jobs');
    }
};
