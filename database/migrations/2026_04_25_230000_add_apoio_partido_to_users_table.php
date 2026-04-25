<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('apoio_partido')->nullable()->default(null)->after('status');
            $table->timestamp('data_apoio')->nullable()->after('apoio_partido');
            $table->string('ip_apoio', 45)->nullable()->after('data_apoio');
        });

        // Tabela de log de decisões (auditoria)
        Schema::create('apoio_partido_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // UUID ou int dependendo do modelo
            $table->boolean('decisao'); // true = apoiou, false = recusou
            $table->string('ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['apoio_partido', 'data_apoio', 'ip_apoio']);
        });
        Schema::dropIfExists('apoio_partido_logs');
    }
};
