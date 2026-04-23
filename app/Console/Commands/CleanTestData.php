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

        // Desabilita checagem de chaves estrangeiras para permitir o truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Mantém apenas o Admin principal
        $adminEmail = 'viniamaral2026@gmail.com';
        
        // 1. Limpar Tabelas Dependentes Primeiro
        DB::table('points')->truncate();
        DB::table('memberships')->truncate();
        DB::table('audio_interactions')->truncate();
        DB::table('financial_records')->truncate();
        DB::table('public_demands')->truncate();
        DB::table('petition_signatures')->truncate();
        DB::table('party_signatures')->truncate();
        DB::table('directory_actions')->truncate();
        DB::table('directory_members')->truncate();
        DB::table('legal_requests')->truncate();
        DB::table('legal_complaints')->truncate();
        DB::table('legal_disciplinary_processes')->truncate();

        // 2. Limpar Diretórios
        Directory::truncate();
        $this->info("✓ Diretórios/comitês removidos.");

        // 3. Deletar Membros (exceto o admin principal)
        $deletedUsers = User::where('email', '!=', $adminEmail)->count();
        User::where('email', '!=', $adminEmail)->delete();
        $this->info("✓ $deletedUsers membros de teste removidos.");

        // Reabilita checagem
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->info('====================================');
        $this->info('SISTEMA LIMPO E PRONTO PARA USO REAL!');
        $this->info('Apenas seu acesso admin foi mantido.');
        $this->info('====================================');
    }
}
