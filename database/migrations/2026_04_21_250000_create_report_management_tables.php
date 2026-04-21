<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Internal Notes
        Schema::create('report_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('water_report_id')->constrained('water_reports')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Admin/Staff who wrote the note
            $table->text('content');
            $table->boolean('is_internal')->default(true); // If false, user can see it
            $table->timestamps();
        });

        // 2. Case Forwarding (Tracking)
        Schema::create('report_forwardings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('water_report_id')->constrained('water_reports')->onDelete('cascade');
            $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade');
            $table->string('to_sector'); // juridico, comunicacao, mobilizacao, regional, etc.
            $table->text('reason')->nullable();
            $table->string('status')->default('pendente'); // pendente, aceito, resolvido
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_forwardings');
        Schema::dropIfExists('report_notes');
    }
};
