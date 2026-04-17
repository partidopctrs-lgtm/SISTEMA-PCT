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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_code')->unique();
            $table->enum('complaint_type', ['popular', 'internal']);
            $table->string('name')->nullable(); // Anonymous if null
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('target_name')->nullable(); // For internal conduta
            $table->foreignId('directory_id')->nullable()->constrained()->nullOnDelete();
            $table->string('infraction_type')->nullable(); // leve, moderada, grave, critica
            $table->text('description');
            $table->string('evidence_url')->nullable();
            $table->enum('status', ['new', 'investigating', 'resolved', 'archived'])->default('new');
            $table->string('severity')->default('green'); // green, yellow, red, black
            $table->text('resolution_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
