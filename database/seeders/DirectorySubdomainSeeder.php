<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DirectorySubdomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Localizar ou criar o diretório de Taquara
        $taquara = Directory::where('city', 'like', '%Taquara%')->first();
        if (!$taquara) {
            $taquara = Directory::create([
                'name' => 'Diretório Municipal de Taquara',
                'city' => 'Taquara',
                'state' => 'RS',
                'directory_type' => 'municipal',
                'slug' => 'taquara',
                'subdomain' => 'taquara',
                'operational_status' => 'active',
                'affiliation_status' => 'official',
                'founding_date' => '2026-04-16'
            ]);
        } else {
            $taquara->update([
                'slug' => 'taquara',
                'subdomain' => 'taquara',
                'founding_date' => '2026-04-16'
            ]);
        }

        // 2. Configurar a Diretoria Executiva
        
        // Vini - Diretor Fundador (Presidente)
        $vini = User::updateOrCreate(
            ['email' => 'viniamaral2026@gmail.com'],
            [
                'name' => 'Vini Amaral',
                'password' => Hash::make('Ma596220@'),
                'role' => 'admin',
                'committee_id' => $taquara->id,
                'status' => 'active'
            ]
        );

        // Marcia - Tesoureira
        $marcia = User::updateOrCreate(
            ['email' => 'marciamachado335@gmail.com'],
            [
                'name' => 'Marcia Regina Machado da Silva',
                'password' => Hash::make('PCT@123456'),
                'role' => 'committee',
                'committee_id' => $taquara->id,
                'status' => 'active'
            ]
        );

        // Maria de Fatima - Secretária
        $maria = User::where('name', 'like', '%Maria de Fatima Dresbach%')->first();
        if (!$maria) {
            $maria = User::create([
                'name' => 'Maria de Fatima Dresbach',
                'email' => 'maria.fatima@pct.social.br', // Email fictício se não existir
                'password' => Hash::make('PCT@123456'),
                'role' => 'committee',
                'committee_id' => $taquara->id,
                'status' => 'active'
            ]);
        } else {
            $maria->update(['committee_id' => $taquara->id, 'role' => 'committee']);
        }

        // 3. Vincular cargos ao diretório
        $taquara->update([
            'president_id' => $vini->id,
            'vice_president_id' => $marcia->id,
            'treasurer_id' => $marcia->id,
            'secretary_id' => $maria->id
        ]);

        // 4. Gerar membros adicionais para totalizar 15
        $additionalMembers = [
            'Ricardo Santos', 'Ana Paula Oliveira', 'Lucas Ferreira', 
            'Juliana Costa', 'Marcelo Almeida', 'Fernanda Souza',
            'Gabriel Rodrigues', 'Camila Martins', 'Rodrigo Silva',
            'Beatriz Lima', 'Thiago Rocha', 'Patrícia Gomes'
        ];

        foreach ($additionalMembers as $name) {
            $email = Str::slug($name) . '@exemplo.com';
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('PCT@123456'),
                    'role' => 'affiliate',
                    'committee_id' => $taquara->id,
                    'status' => 'active'
                ]
            );

            \App\Models\Membership::updateOrCreate(
                ['user_id' => $user->id, 'directory_id' => $taquara->id],
                ['membership_status' => 'active', 'joined_at' => now(), 'source' => 'web_registration']
            );
        }

        // 5. Garantir que outros diretórios tenham slugs se necessário
        Directory::whereNull('slug')->each(function ($dir) {
            $dir->update([
                'slug' => Str::slug($dir->city . '-' . $dir->id),
                'subdomain' => Str::slug($dir->city . '-' . $dir->id)
            ]);
        });
    }
}
