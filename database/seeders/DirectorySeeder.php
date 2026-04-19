<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directory;
use App\Models\User;
use App\Models\DirectoryMember;
use Illuminate\Support\Str;

class DirectorySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        if ($users->isEmpty()) return;

        // 1. Diretório Solicitante (Submitted / Applicant)
        $d1 = Directory::create([
            'uuid' => (string) Str::uuid(),
            'name' => 'Diretório Municipal de Taquara',
            'city' => 'Taquara',
            'state' => 'RS',
            'directory_type' => 'Municipal',
            'operational_status' => 'submitted',
            'affiliation_status' => 'applicant',
            'legal_status' => 'not_formalized',
            'protocol_number' => 'PRT-DIR-' . date('Ymd') . '-0001',
            'president_id' => $users->first()->id,
        ]);
        $d1->seedChecklist();

        // 2. Diretório Provisório (Approved / Provisional)
        $d2 = Directory::create([
            'uuid' => (string) Str::uuid(),
            'name' => 'Diretório Regional de Porto Alegre',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'directory_type' => 'Regional',
            'operational_status' => 'approved',
            'affiliation_status' => 'provisional',
            'legal_status' => 'in_formalization',
            'protocol_number' => 'PRT-DIR-' . date('Ymd') . '-0002',
            'president_id' => $users->skip(1)->first()?->id ?? $users->first()->id,
            'secretary_id' => $users->skip(2)->first()?->id ?? $users->first()->id,
        ]);
        $d2->seedChecklist();
        
        // Adicionar alguns fundadores
        DirectoryMember::create([
            'directory_id' => $d2->id,
            'name' => 'Marcos Fundador',
            'cpf' => '111.222.333-44',
            'member_type' => 'founder',
            'verification_status' => 'verified'
        ]);

        DirectoryMember::create([
            'directory_id' => $d2->id,
            'name' => 'Ana Fundadora',
            'cpf' => '555.666.777-88',
            'member_type' => 'founder',
            'verification_status' => 'pending'
        ]);

        // 3. Diretório Oficial (Active / Official)
        $d3 = Directory::create([
            'uuid' => (string) Str::uuid(),
            'name' => 'Diretório Nacional PCT',
            'city' => 'Brasília',
            'state' => 'DF',
            'directory_type' => 'Nacional',
            'operational_status' => 'active',
            'affiliation_status' => 'official',
            'legal_status' => 'regular',
            'protocol_number' => 'PRT-DIR-' . date('Ymd') . '-0003',
            'president_id' => $users->first()->id,
            'cnpj' => '12.345.678/0001-90',
            'registry_number' => 'REG-12345',
        ]);
        $d3->seedChecklist();
        
        // Simular aprovação de alguns itens do checklist no diretório oficial
        $d3->checklistItems()->whereIn('item_code', ['RG_CPF', 'TITULO', 'RESIDENCIA'])->update([
            'status' => 'approved',
            'verified_at' => now(),
        ]);
    }
}
