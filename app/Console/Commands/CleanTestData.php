<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Directory;
use App\Models\Membership;
use App\Models\FinancialRecord;
use App\Models\LegalRequest;
use App\Models\PublicDemand;
use App\Models\PartySignature;
use Illuminate\Support\Facades\DB;

class CleanTestData extends Command
{
    protected $signature = 'pct:clean-test-data';
    protected $description = 'Remove todos os dados de teste e deixa o sistema pronto para uso real';

    public function handle()
    {
        if (!$this->confirm('Isso irá apagar todos os membros de teste, diretórios e registros financeiros. Deseja continuar?')) {
            return;
        }

        $this->info('Limpando base de dados...');

        // Mantém apenas o Admin principal e o Candidato (opcional)
        $adminEmail = 'viniamaral2026@gmail.com';
        
        // 1. Deletar Membros (exceto o admin principal)
        $deletedUsers = User::where('email', '!=', $adminEmail)->count();
        User::where('email', '!=', $adminEmail)->delete();
        $this->info("✓ $deletedUsers membros de teste removidos.");

        // 2. Limpar Diretórios (exceto os oficiais se houver, mas por segurança vamos limpar e deixar o admin recriar)
        $deletedDirs = Directory::count();
        Directory::truncate();
        $this->info("✓ $deletedDirs diretórios/comitês removidos.");

        // 3. Limpar Registros Financeiros
        FinancialRecord::truncate();
        $this->info("✓ Registros financeiros limpos.");

        // 4. Limpar Demandas e Assinaturas
        PublicDemand::truncate();
        PartySignature::truncate();
        $this->info("✓ Demandas e Assinaturas limpas.");

        // 5. Limpar Outras tabelas de apoio
        DB::table('memberships')->truncate();
        DB::table('points')->truncate();
        DB::table('audio_interactions')->truncate();
        
        $this->info('====================================');
        $this->info('SISTEMA LIMPO E PRONTO PARA USO REAL!');
        $this->info('Apenas seu acesso admin foi mantido.');
        $this->info('====================================');
    }
}
