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
        Schema::create('directory_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->string('review_type'); // administrative, legal, regional, national
            $table->string('status')->default('pending'); // pending, approved, rejected, needs_correction
            $table->text('review_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directory_reviews');
    }
};
