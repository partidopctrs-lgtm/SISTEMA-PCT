<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Adicionar committee_id aos usuários
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'committee_id')) {
                $table->foreignId('committee_id')->nullable()->constrained('directories')->onDelete('set null');
            }
        });

        // Prestadores
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->string('name');
            $table->string('document_number')->unique(); // CPF/CNPJ
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('type'); // PF, PJ, recorrente, eventual
            $table->string('status')->default('ativo');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        // Documentos
        Schema::create('directory_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->string('category'); // ata, oficio, contrato, etc
            $table->string('title');
            $table->string('file_path');
            $table->string('status')->default('enviado'); // rascunho, enviado, analise, aprovado, rejeitado
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Despesas
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->foreignId('provider_id')->nullable()->constrained('providers')->onDelete('set null');
            $table->string('category');
            $table->string('description');
            $table->decimal('value', 15, 2);
            $table->date('date');
            $table->string('receipt_path')->nullable();
            $table->string('status')->default('pendente');
            $table->string('approval_level')->default('simples'); // simples, presidente, nacional
            $table->timestamps();
        });

        // Serviços Contratados
        Schema::create('contracted_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->foreignId('provider_id')->constrained('providers')->onDelete('cascade');
            $table->string('type'); // juridico, design, etc
            $table->text('scope');
            $table->decimal('value', 15, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('contract_path')->nullable();
            $table->string('status')->default('ativo');
            $table->timestamps();
        });

        // Solicitações
        Schema::create('solicitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->string('destination'); // juridico, financeiro, etc
            $table->string('type'); // duvida, analise, etc
            $table->string('priority')->default('media');
            $table->string('subject');
            $table->text('description');
            $table->string('attachment_path')->nullable();
            $table->string('status')->default('aberto');
            $table->text('response')->nullable();
            $table->timestamps();
        });

        // Reembolsos
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('category');
            $table->text('justification');
            $table->decimal('value', 15, 2);
            $table->string('receipt_path');
            $table->string('status')->default('solicitado');
            $table->timestamps();
        });

        // Tarefas
        Schema::create('directory_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->string('priority')->default('media');
            $table->string('status')->default('nova');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['committee_id']);
            $table->dropColumn('committee_id');
        });

        Schema::dropIfExists('directory_tasks');
        Schema::dropIfExists('reimbursements');
        Schema::dropIfExists('solicitations');
        Schema::dropIfExists('contracted_services');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('directory_documents');
        Schema::dropIfExists('providers');
    }
};
