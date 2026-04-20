<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::where('role', 'admin')->first();
        $candidate = \App\Models\User::where('role', 'candidate')->first() ?? $admin;
        $affiliates = \App\Models\User::where('role', 'affiliate')->limit(10)->get();

        if (!$candidate) return;

        // 1. Projeções de Votos
        \App\Models\VoteProjection::create([
            'candidate_id' => $candidate->id,
            'city' => 'Taquara',
            'neighborhood' => 'Centro',
            'expected_votes' => 1200,
            'actual_votes' => 850,
            'notes' => 'Forte presença em comércios locais.'
        ]);

        \App\Models\VoteProjection::create([
            'candidate_id' => $candidate->id,
            'city' => 'Taquara',
            'neighborhood' => 'Santa Maria',
            'expected_votes' => 800,
            'actual_votes' => 420,
            'notes' => 'Necessário intensificar caminhadas.'
        ]);

        // 2. Equipe de Campanha
        foreach ($affiliates->take(3) as $user) {
            \App\Models\CampaignTeamMember::create([
                'candidate_id' => $candidate->id,
                'user_id' => $user->id,
                'role' => 'Coordenador de Base',
                'is_active' => true
            ]);
        }

        // 3. Doações
        foreach ($affiliates as $user) {
            \App\Models\Donation::create([
                'user_id' => $user->id,
                'amount' => rand(50, 500),
                'payment_method' => 'pix',
                'status' => 'confirmed',
                'confirmed_at' => now()->subDays(rand(1, 30))
            ]);
        }

        // 4. Broadcasts
        \App\Models\CommunicationBroadcast::create([
            'sender_id' => $admin->id,
            'subject' => 'Convocação Geral: Ativação de Diretórios',
            'content' => 'Olá líderes, iniciamos a fase de ativação oficial...',
            'target_segment' => 'coordenadores',
            'sent_count' => 45,
            'sent_at' => now()->subHours(2)
        ]);

        // 5. Demandas da População (Adicionais)
        \App\Models\PublicDemand::create([
            'user_id' => $affiliates->first()->id,
            'city' => 'Taquara',
            'state' => 'RS',
            'category' => 'Saúde',
            'title' => 'Falta de medicamentos no posto central',
            'description' => 'Moradores relatam falta de dipirona e outros itens básicos.',
            'protocol_number' => 'PCT-DEM-2026-001',
            'status' => 'analise',
            'is_urgent' => true
        ]);
    }
}
