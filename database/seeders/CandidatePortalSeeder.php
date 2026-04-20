<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\VoteProjection;
use App\Models\CampaignTeamMember;
use App\Models\Event;
use App\Models\Donation;
use Illuminate\Support\Facades\Hash;
 
class CandidatePortalSeeder extends Seeder
{
    public function run(): void
    {
        // Find or Create Candidate
        $candidate = User::where('email', 'viniamaral2026@gmail.com')->first();
        
        if (!$candidate) {
            $candidate = User::create([
                'name' => 'Vinicius Amaral',
                'email' => 'viniamaral2026@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin', // He is admin but we can treat him as candidate for tests
                'city' => 'Porto Alegre',
                'state' => 'RS'
            ]);
        }
 
        // Ensure role is admin OR candidate for testing
        // The middleware checks for role:candidate. 
        // But the user might be logged in as admin.
        
        // 1. Projeções de Votos
        VoteProjection::updateOrCreate([
            'candidate_id' => $candidate->id,
            'city' => 'Porto Alegre',
            'neighborhood' => 'Centro Histórico'
        ], [
            'expected_votes' => 1500,
            'actual_votes' => 450
        ]);
 
        VoteProjection::updateOrCreate([
            'candidate_id' => $candidate->id,
            'city' => 'Porto Alegre',
            'neighborhood' => 'Menino Deus'
        ], [
            'expected_votes' => 1200,
            'actual_votes' => 300
        ]);
 
        VoteProjection::updateOrCreate([
            'candidate_id' => $candidate->id,
            'city' => 'Canoas',
            'neighborhood' => 'Centro'
        ], [
            'expected_votes' => 800,
            'actual_votes' => 120
        ]);
 
        // 2. Equipe de Campanha
        $members = User::where('id', '!=', $candidate->id)->limit(5)->get();
        foreach ($members as $index => $m) {
            CampaignTeamMember::updateOrCreate([
                'candidate_id' => $candidate->id,
                'user_id' => $m->id
            ], [
                'role' => $index == 0 ? 'Coordenador Geral' : 'Voluntário',
                'is_active' => true
            ]);
        }
 
        // 3. Eventos (Agenda)
        Event::updateOrCreate([
            'title' => 'Reunião com Apoiadores - POA',
            'candidate_id' => $candidate->id
        ], [
            'description' => 'Alinhamento de metas para o bairro Centro.',
            'start_time' => now()->addDays(1)->setHour(19)->setMinute(0),
            'end_time' => now()->addDays(1)->setHour(21)->setMinute(0),
            'location' => 'Auditório Central'
        ]);
 
        Event::updateOrCreate([
            'title' => 'Caminhada Cidadã',
            'candidate_id' => $candidate->id
        ], [
            'description' => 'Mobilização de rua.',
            'start_time' => now()->addDays(3)->setHour(10)->setMinute(0),
            'end_time' => now()->addDays(3)->setHour(13)->setMinute(0),
            'location' => 'Parque da Redenção'
        ]);
 
        // 4. Doações (Saldo)
        Donation::updateOrCreate([
            'transaction_id' => 'TXN_TEST_001',
            'candidate_id' => $candidate->id
        ], [
            'user_id' => $members[0]->id,
            'amount' => 500.00,
            'payment_method' => 'pix',
            'status' => 'confirmed',
            'confirmed_at' => now()
        ]);
 
        Donation::updateOrCreate([
            'transaction_id' => 'TXN_TEST_002',
            'candidate_id' => $candidate->id
        ], [
            'user_id' => $members[1]->id,
            'amount' => 1250.00,
            'payment_method' => 'credit_card',
            'status' => 'confirmed',
            'confirmed_at' => now()
        ]);

        // 5. Link users as referrals
        User::where('id', '!=', $candidate->id)->limit(10)->update(['referred_by' => $candidate->id]);
    }
}
