<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // anonimato
            $table->uuid('user_uuid')->nullable();

            // datos del caso
            $table->string('category'); // verbal, fisico, digital, social
            $table->text('description');

            $table->string('location')->nullable();
            $table->string('frequency')->nullable();

            $table->string('victim_type')->nullable(); // self, other, unknown
            $table->integer('aggressors')->default(1);

            $table->string('emotion')->nullable();
            $table->integer('intensity')->default(3);

            // control del caso
            $table->string('status')->default('pending'); // pending, reviewed, escalated, resolved

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
