<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $password = \Illuminate\Support\Facades\Hash::make('PCT@123456');

        $users = [
            [
                'name' => 'Admin PCT',
                'email' => 'admin@pct.social.br',
                'password' => $password,
                'role' => 'admin',
                'registration_number' => 'PCT001',
            ],
            [
                'name' => 'Afiliado Teste',
                'email' => 'afiliado@pct.social.br',
                'password' => $password,
                'role' => 'affiliate',
                'registration_number' => 'PCT123AF',
            ],
            [
                'name' => 'João Silva',
                'email' => 'candidato@pct.social.br',
                'password' => $password,
                'role' => 'candidate',
                'registration_number' => 'PCT-RS-001',
            ],
            [
                'name' => 'Líder Comitê POA',
                'email' => 'comite@pct.social.br',
                'password' => $password,
                'role' => 'committee',
                'registration_number' => 'PCT-POA-LID',
            ],
            [
                'name' => 'Tesouraria PCT',
                'email' => 'financeiro@pct.social.br',
                'password' => $password,
                'role' => 'finance',
                'registration_number' => 'PCT005',
            ],
            [
                'name' => 'Jurídico PCT',
                'email' => 'juridico@pct.social.br',
                'password' => $password,
                'role' => 'legal',
                'registration_number' => 'PCT006',
            ],
            [
                'name' => 'Comunicação PCT',
                'email' => 'comunicacao@pct.social.br',
                'password' => $password,
                'role' => 'communication',
                'registration_number' => 'PCT007',
            ],
        ];

        foreach ($users as $userData) {
            \App\Models\User::create($userData);
        }
    }
}
