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
        // 1. Projeções de Votos (Portal do Candidato)
        Schema::create('vote_projections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->string('city');
            $table->string('neighborhood')->nullable();
            $table->integer('expected_votes')->default(0);
            $table->integer('actual_votes')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 2. Equipe de Campanha
        Schema::create('campaign_team_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('role'); // coordenador, voluntario, assessor, financeiro
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 3. Doações (Portal Financeiro)
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->string('payment_method'); // pix, credit_card, boleto
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->string('transaction_id')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });

        // 4. Broadcasts de Comunicação
        Schema::create('communication_broadcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->string('subject');
            $table->text('content');
            $table->string('target_segment'); // todos, filiados, coordenadores
            $table->integer('sent_count')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communication_broadcasts');
        Schema::dropIfExists('donations');
        Schema::dropIfExists('campaign_team_members');
        Schema::dropIfExists('vote_projections');
    }
};
