<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('submission_id')->unique();
            $table->string('slug')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->text('bio')->nullable();
            $table->json('certifications')->nullable();
            $table->json('client_levels')->nullable();
            $table->json('topics')->nullable();
            $table->json('specializations')->nullable();
            $table->string('coaching_style')->nullable();
            $table->string('secondary_style')->nullable();
            $table->unsignedInteger('session_rate')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
