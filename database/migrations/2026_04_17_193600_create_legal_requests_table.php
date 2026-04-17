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
        Schema::create('legal_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code')->unique();
            $table->foreignId('requester_id')->constrained('users')->cascadeOnDelete();
            $table->string('requester_profile_type');
            $table->foreignId('directory_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('request_type'); // legal_question, document_review, internal_conflict, compliance_issue, candidate_support
            $table->string('priority')->default('medium'); // low, medium, high, urgent
            $table->string('status')->default('new'); // new, assigned, in_progress, waiting, completed, cancelled
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->string('level')->default('local'); // local, state, national
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_requests');
    }
};
