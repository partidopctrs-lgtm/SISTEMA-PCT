<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Directory;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove o diretório de Porto Alegre solicitado
        Directory::where('name', 'like', '%Porto Alegre%')->delete();
        
        // Opcional: Se o usuário diz que só deveriam ter 2 membros, 
        // mas mostra 6, pode haver usuários duplicados ou de teste.
        // Como não posso deletar usuários sem saber quem são, 
        // vou apenas registrar no log ou deixar para o admin gerenciar na tela de membros.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
