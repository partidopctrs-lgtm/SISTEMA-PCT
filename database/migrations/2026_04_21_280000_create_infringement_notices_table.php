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
        Schema::create('infringement_notices', function (Blueprint $table) {
            $table->id();
            $table->string('notice_id'); // e.g., AI 33/2025
            $table->integer('year');
            $table->string('entity'); // e.g., CORSAN
            $table->string('municipality_name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infringement_notices');
    }
};
