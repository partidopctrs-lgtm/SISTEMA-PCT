<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directory;
use App\Models\InternalPosition;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GovernanceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Diretórios Reais
        $taquara = Directory::updateOrCreate(
            ['city' => 'Taquara', 'state' => 'RS'],
            [
                'name' => 'Diretório Municipal de Taquara',
                'directory_type' => 'municipal',
                'operational_status' => 'active',
                'affiliation_status' => 'official',
                'legal_status' => 'regular'
            ]
        );

        Directory::updateOrCreate(
            ['city' => 'Porto Alegre', 'state' => 'RS'],
            [
                'name' => 'Diretório Metropolitano de Porto Alegre',
                'directory_type' => 'municipal',
                'operational_status' => 'active',
                'affiliation_status' => 'official',
                'legal_status' => 'regular'
            ]
        );

        // 2. Cargos de Governança
        $positions = [
            ['title' => 'Presidente Nacional', 'level' => 'nacional', 'hierarchy_weight' => 10],
            ['title' => 'Secretário Geral', 'level' => 'nacional', 'hierarchy_weight' => 9],
            ['title' => 'Tesoureiro Nacional', 'level' => 'nacional', 'hierarchy_weight' => 9],
            ['title' => 'Coordenador Regional RS', 'level' => 'estadual', 'hierarchy_weight' => 7],
            ['title' => 'Presidente Municipal - Taquara', 'level' => 'municipal', 'hierarchy_weight' => 5],
        ];

        foreach ($positions as $pos) {
            InternalPosition::updateOrCreate(['title' => $pos['title']], $pos);
        }

        // 3. Membros Reais (Se não existirem)
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $pres = InternalPosition::where('title', 'Presidente Nacional')->first();
            $admin->update(['position_id' => $pres->id, 'city' => 'Taquara', 'state' => 'RS']);
        }

        // Criar um usuário para Taquara se não houver
        User::updateOrCreate(
            ['email' => 'taquara@pct.social.br'],
            [
                'name' => 'Liderança Taquara',
                'password' => Hash::make('password'),
                'role' => 'committee',
                'city' => 'Taquara',
                'state' => 'RS',
                'status' => 'active',
                'committee_id' => $taquara->id
            ]
        );
    }
}
