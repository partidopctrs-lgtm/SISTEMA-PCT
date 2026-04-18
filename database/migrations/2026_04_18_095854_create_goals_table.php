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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['state', 'city']);
            $table->string('location_name');
            $table->integer('target_members');
            $table->integer('current_members')->default(0);
            $table->date('deadline')->nullable();
            $table->enum('status', ['on_track', 'at_risk', 'critical'])->default('on_track');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
