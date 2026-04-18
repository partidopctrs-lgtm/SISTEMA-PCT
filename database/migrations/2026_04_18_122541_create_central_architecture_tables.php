<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Partido em Formação: Assinaturas de Apoio
        Schema::create('party_signatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('full_name');
            $table->string('cpf')->unique();
            $table->string('voter_title')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('protocol_number')->unique();
            $table->string('pdf_path')->nullable();
            $table->string('status')->default('pendente'); // pendente, validado, rejeitado
            $table->timestamps();
        });

        // 2. Demandas da População (Ouvidoria/Denúncias do Afiliado)
        Schema::create('public_demands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('city');
            $table->string('state');
            $table->string('category'); // saude, educacao, infraestrutura, seguranca
            $table->string('title');
            $table->text('description');
            $table->string('attachment_path')->nullable();
            $table->string('protocol_number')->unique();
            $table->string('pdf_protocol_path')->nullable();
            $table->string('status')->default('analise'); // analise, apurado, protocolo_gerado, resolvido
            $table->boolean('is_urgent')->default(false);
            $table->timestamps();
        });

        // 3. Governança Interna: Cargos e Votações
        Schema::create('internal_positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level'); // nacional, estadual, municipal
            $table->integer('hierarchy_weight')->default(1);
            $table->timestamps();
        });

        // 4. Jurídico: Perfis de Advogado
        Schema::create('legal_lawyer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('oab_number')->unique();
            $table->string('specialty')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('tasks_completed')->default(0);
            $table->timestamps();
        });

        // 5. Jurídico: Denúncias (Complaints) Institucionais
        Schema::create('legal_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->nullable()->constrained('users')->onDelete('set null'); // Pode ser anônimo
            $table->string('type'); // conduta, corrupcao, administrativa
            $table->text('description');
            $table->string('evidence_path')->nullable();
            $table->string('status')->default('recebida');
            $table->foreignId('assigned_lawyer_id')->nullable()->constrained('legal_lawyer_profiles')->onDelete('set null');
            $table->timestamps();
        });

        // 6. Jurídico: Processos Disciplinares
        Schema::create('legal_disciplinary_processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accused_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('complaint_id')->nullable()->constrained('legal_complaints')->onDelete('set null');
            $table->foreignId('relator_id')->nullable()->constrained('legal_lawyer_profiles')->onDelete('set null');
            $table->string('status')->default('aberto'); // aberto, tramitacao, julgamento, concluido
            $table->string('decision')->nullable(); // advertencia, suspensao, expulsao, arquivado
            $table->timestamps();
        });

        // 7. Jurídico: Pareceres (Legal Opinions)
        Schema::create('legal_opinions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lawyer_id')->constrained('legal_lawyer_profiles')->onDelete('cascade');
            $table->nullableMorphs('opinionable'); // Pode ser vinculado a uma demanda, denúncia, processo ou contrato
            $table->string('title');
            $table->text('content');
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
        
        // 8. Jurídico: Tarefas do Advogado
        Schema::create('legal_lawyer_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lawyer_id')->constrained('legal_lawyer_profiles')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->date('due_date')->nullable();
            $table->string('status')->default('pendente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_lawyer_tasks');
        Schema::dropIfExists('legal_opinions');
        Schema::dropIfExists('legal_disciplinary_processes');
        Schema::dropIfExists('legal_complaints');
        Schema::dropIfExists('legal_lawyer_profiles');
        Schema::dropIfExists('internal_positions');
        Schema::dropIfExists('public_demands');
        Schema::dropIfExists('party_signatures');
    }
};
