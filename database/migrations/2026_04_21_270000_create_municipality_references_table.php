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
        Schema::create('municipality_references', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('has_universalization_meta')->default(false);
            $table->boolean('adhered_to_prae')->default(false);
            $table->enum('pmsb_status', ['updated', 'not_updated', 'updating', 'none'])->default('none');
            $table->boolean('is_corsan_system')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipality_references');
    }
};
