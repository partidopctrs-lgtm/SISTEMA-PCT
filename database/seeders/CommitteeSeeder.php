<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directory;
use App\Models\User;
use App\Models\Provider;
use App\Models\Expense;
use App\Models\DirectoryDocument;
use Illuminate\Support\Facades\Hash;

class CommitteeSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Criar o Diretório
        $directory = Directory::create([
            'name' => 'Diretório Municipal de Porto Alegre',
            'directory_type' => 'municipal',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'operational_status' => 'active',
            'affiliation_status' => 'official',
            'legal_status' => 'regular',
        ]);

        // 2. Criar Usuário do Comitê (Presidente Local)
        $committeeUser = User::create([
            'name' => 'Presidente Local Teste',
            'email' => 'comite@pct.social.br',
            'password' => Hash::make('Ma596220@'),
            'role' => 'committee',
            'status' => 'active',
            'committee_id' => $directory->id,
            'registration_number' => 'PCT-COM-001',
        ]);

        // 3. Criar Prestador
        $provider = Provider::create([
            'directory_id' => $directory->id,
            'name' => 'HostMaster Serviços Web',
            'document_number' => '12.345.678/0001-90',
            'email' => 'contato@hostmaster.com.br',
            'type' => 'PJ',
        ]);

        // 4. Lançar Despesas solicitadas pelo usuário
        // Cenário A: R$ 56 da VPS
        Expense::create([
            'directory_id' => $directory->id,
            'provider_id' => $provider->id,
            'category' => 'comunicação',
            'description' => 'Serviço de VPS para o site institucional local',
            'value' => 56.00,
            'date' => now(),
            'status' => 'aprovada',
            'approval_level' => 'simples',
        ]);

        // Cenário B: R$ 49 do domínio
        Expense::create([
            'directory_id' => $directory->id,
            'provider_id' => $provider->id,
            'category' => 'comunicação',
            'description' => 'Renovação anual de domínio pct.social.br',
            'value' => 49.00,
            'date' => now()->subDays(5),
            'status' => 'aprovada',
            'approval_level' => 'simples',
        ]);

        // 5. Adicionar Documento de Teste
        DirectoryDocument::create([
            'directory_id' => $directory->id,
            'category' => 'ata',
            'title' => 'Ata de Fundação do Diretório Porto Alegre',
            'file_path' => 'documents/seeds/ata_fundacao.pdf',
            'status' => 'aprovado',
        ]);
    }
}
