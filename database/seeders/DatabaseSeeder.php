<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Goal;
use App\Models\Point;
use App\Models\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('Ma596220@');

        // 1. Create Users
        $admin = User::create([
            'name' => 'Marcos Vinicius Dresbach do Amaral',
            'email' => 'viniamaral2026@gmail.com',
            'password' => $password,
            'role' => 'admin',
            'status' => 'active',
            'registration_number' => 'PCT-ADM-001',
            'cpf' => '000.000.000-01',
            'rg' => '123456789',
        ]);

        User::create([
            'name' => 'Marcia Regina Machado da Silva',
            'email' => 'marciamachado335@gmail.com',
            'password' => $password,
            'role' => 'affiliate',
            'status' => 'active',
            'registration_number' => 'PCT-AFI-002',
        ]);

        $affiliate = User::create([
            'name' => 'Afiliado Teste',
            'email' => 'teste@pct.social.br',
            'password' => $password,
            'role' => 'affiliate',
            'status' => 'active',
            'registration_number' => 'PCT-AFI-123',
            'city' => 'Porto Alegre',
            'state' => 'RS',
        ]);

        // 2. Create Goals
        Goal::create([
            'type' => 'state',
            'location_name' => 'RS',
            'target_members' => 5000,
            'current_members' => 1200,
            'status' => 'at_risk',
        ]);

        Goal::create([
            'type' => 'city',
            'location_name' => 'Taquara',
            'target_members' => 500,
            'current_members' => 450,
            'status' => 'on_track',
        ]);

        // 3. Create Gamification Points
        Point::create([
            'user_id' => $affiliate->id,
            'amount' => 500,
            'reason' => 'Cadastro completo realizado',
        ]);

        Point::create([
            'user_id' => $affiliate->id,
            'amount' => 100,
            'reason' => 'Referência de novo membro',
        ]);

        // 4. Create Campaigns
        Campaign::create([
            'title' => 'Lançamento Nacional PCT',
            'description' => 'Disparo em massa para todos os apoiadores.',
            'type' => 'email',
            'recurrency' => 'none',
            'scheduled_at' => now()->addDays(2),
        ]);

        $this->call(GovernanceSeeder::class);

        $this->command->info('Database populated with success!');
    }
}
