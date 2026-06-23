<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('mood')->default('neutral'); // happy, sad, neutral, angry, anxious
            $table->boolean('is_private')->default(false);
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};