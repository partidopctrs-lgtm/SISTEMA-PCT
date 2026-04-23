<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Directory;
use App\Models\Membership;
use App\Models\FinancialRecord;
use App\Models\LegalRequest;
use App\Models\LegalComplaint;
use App\Models\Event;
use App\Models\CampaignTeamMember;
use App\Models\InternalPosition;
use App\Models\Goal;
use App\Models\Point;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SystemDataSeeder extends Seeder
{
    public function run()
    {
        $password = 'PCT@123456';

        // 1. Ensure Admins exist
        $this->command->info('Creating Admins...');
        
        $adminEmails = [
            'viniamaral2026@gmail.com' => 'Presidente Fundador - Vini Amaral',
            'dmgproductionsoficial@gmail.com' => 'Diretoria Executiva - DMG',
            'dreybach@gmail.com' => 'Diretoria Executiva - Dreybach',
            'marciamachado335@gmail.com' => 'Diretoria Executiva - Marcia Machado',
            'admin@pct.social.br' => 'Administrador do Sistema'
        ];

        foreach ($adminEmails as $email => $name) {
            $existingUser = User::where('email', $email)->first();
            
            if ($existingUser) {
                // Se já existe, apenas garantimos que ele seja ADMIN e esteja ATIVO
                // Não sobrescrevemos o Nome, CPF, Data de Nascimento, etc, para não perder dados reais
                $existingUser->update([
                    'role' => 'admin',
                    'status' => 'active'
                ]);
            } else {
                // Se não existe, criamos com os dados padrão
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => 'PCT@Forte2026!',
                    'role' => 'admin',
                    'status' => 'active',
                    'registration_number' => 'PCT-ADM-' . strtoupper(substr(md5($email), 0, 4)),
                    'cpf' => '111.111.111-' . rand(10, 99)
                ]);
            }
        }

        // 2. Create Candidate
        $this->command->info('Creating Candidate...');
        $candidateUser = User::updateOrCreate(
            ['email' => 'candidato@pct.social.br'],
            [
                'name' => 'Candidato Exemplo',
                'password' => $password,
                'role' => 'candidate',
                'status' => 'active',
                'registration_number' => 'PCT-CAN-001',
                'city' => 'Taquara',
                'state' => 'RS',
                'cpf' => '222.222.222-22'
            ]
        );

        Candidate::updateOrCreate(
            ['user_id' => $candidateUser->id],
            [
                'political_name' => 'Candidato Exemplo',
                'target_office' => 'Deputado Federal',
                'status' => 'active'
            ]
        );

        // Create some vote projections
        foreach (range(1, 5) as $i) {
            \App\Models\VoteProjection::updateOrCreate(
                ['candidate_id' => $candidateUser->id, 'neighborhood' => "Bairro $i"],
                [
                    'city' => 'Taquara',
                    'expected_votes' => rand(100, 1000),
                    'actual_votes' => 0
                ]
            );
        }

        // 3. Create Directories (Committees)
        $this->command->info('Creating Directories...');
        $states = ['RS', 'SC', 'PR', 'SP', 'RJ', 'MG'];
        $cities = ['Taquara', 'Porto Alegre', 'Florianópolis', 'Curitiba', 'São Paulo', 'Rio de Janeiro', 'Belo Horizonte'];

        foreach ($states as $index => $state) {
            $city = $cities[$index] ?? 'Capital';
            $directory = Directory::updateOrCreate(
                ['name' => "Diretório Estadual $state"],
                [
                    'city' => $city,
                    'state' => $state,
                    'directory_type' => 'estadual',
                    'operational_status' => 'active',
                    'affiliation_status' => 'official',
                    'legal_status' => 'formalized',
                    'protocol_number' => 'DIR-' . Str::upper(Str::random(6))
                ]
            );

            // Create some local directories
            for ($i = 1; $i <= 3; $i++) {
                Directory::updateOrCreate(
                    ['name' => "Comitê Municipal $city $i"],
                    [
                        'city' => $city,
                        'state' => $state,
                        'directory_type' => 'municipal',
                        'operational_status' => $i == 1 ? 'active' : 'pending',
                        'affiliation_status' => $i == 1 ? 'official' : 'applicant',
                        'legal_status' => $i == 1 ? 'formalized' : 'not_formalized',
                        'protocol_number' => 'DIR-' . Str::upper(Str::random(6))
                    ]
                );
            }
        }

        // 4. Create Real Users (Founding Group & Admins)
        $this->command->info('Creating Real Members...');
        
        $realMembers = [
            ['email' => 'viniamaral2026@gmail.com', 'name' => 'Vini Amaral', 'role' => 'admin', 'registration' => 'PCT-ADM-001', 'cpf' => '111.111.111-11'],
            ['email' => 'marciamachado335@gmail.com', 'name' => 'Marcia Regina Machado da Silva', 'role' => 'admin', 'registration' => 'PCT-ADM-002'],
            ['email' => 'dmgproductionsoficial@gmail.com', 'name' => 'Diretoria Executiva - DMG', 'role' => 'admin', 'registration' => 'PCT-ADM-003'],
            ['email' => 'dreybach@gmail.com', 'name' => 'Diretoria Executiva - Dreybach', 'role' => 'admin', 'registration' => 'PCT-ADM-004'],
            ['email' => 'admin@pct.social.br', 'name' => 'Administrador do Sistema', 'role' => 'admin', 'registration' => 'PCT-ADM-000'],
            ['email' => 'maria.fatima@pct.social.br', 'name' => 'Maria de Fatima Dresbach', 'role' => 'committee', 'registration' => 'PCT-COM-001'],
            ['email' => 'ricardo-santos@exemplo.com', 'name' => 'Ricardo Santos', 'role' => 'affiliate', 'registration' => 'PCT-AFI-010'],
            ['email' => 'ana-paula-oliveira@exemplo.com', 'name' => 'Ana Paula Oliveira', 'role' => 'affiliate', 'registration' => 'PCT-AFI-011'],
            ['email' => 'lucas-ferreira@exemplo.com', 'name' => 'Lucas Ferreira', 'role' => 'affiliate', 'registration' => 'PCT-AFI-012'],
            ['email' => 'juliana-costa@exemplo.com', 'name' => 'Juliana Costa', 'role' => 'affiliate', 'registration' => 'PCT-AFI-013'],
            ['email' => 'marcelo-almeida@exemplo.com', 'name' => 'Marcelo Almeida', 'role' => 'affiliate', 'registration' => 'PCT-AFI-014'],
            ['email' => 'fernanda-souza@exemplo.com', 'name' => 'Fernanda Souza', 'role' => 'affiliate', 'registration' => 'PCT-AFI-015'],
        ];

        foreach ($realMembers as $m) {
            $user = User::updateOrCreate(
                ['email' => $m['email']],
                [
                    'name' => $m['name'],
                    'password' => 'PCT@Forte2026!', // Senha padrão para o grupo fundador
                    'role' => $m['role'],
                    'status' => 'active',
                    'registration_number' => $m['registration'],
                    'cpf' => $m['cpf'] ?? null,
                    'city' => 'Taquara',
                    'state' => 'RS',
                ]
            );

            // Vincula ao primeiro diretório se for comitê ou admin
            if (in_array($m['role'], ['admin', 'committee'])) {
                $dir = Directory::first();
                if ($dir) {
                    $user->update(['committee_id' => $dir->id]);
                    Membership::updateOrCreate(
                        ['user_id' => $user->id, 'directory_id' => $dir->id],
                        ['membership_status' => 'active', 'joined_at' => now()]
                    );
                }
            }
        }

        // 5. Financial Records
        $this->command->info('Creating Financial Records...');
        $categories = ['donation', 'event', 'marketing', 'legal', 'education', 'rent'];
        $firstDir = Directory::first();
        $defaultDirId = $firstDir ? $firstDir->id : 1;

        foreach (range(1, 50) as $i) {
            $dirId = Directory::inRandomOrder()->first()?->id ?? $defaultDirId;
            $approver = User::where('role', 'admin')->first();
            FinancialRecord::create([
                'directory_id' => $dirId,
                'type' => rand(0, 1) ? 'revenue' : 'expense',
                'category' => $categories[array_rand($categories)],
                'description' => "Transação de teste $i",
                'amount' => rand(100, 5000),
                'status' => 'approved',
                'approved_by' => $approver?->id,
                'created_at' => now()->subDays(rand(1, 60))
            ]);
        }

        // 6. Legal Requests
        $this->command->info('Creating Legal Requests...');
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $lStatuses = ['new', 'in_progress', 'completed'];
        foreach (range(1, 20) as $i) {
            $requester = User::where('role', 'affiliate')->inRandomOrder()->first();
            if (!$requester) continue;

            LegalRequest::create([
                'request_code' => 'JUR-' . Str::upper(Str::random(6)),
                'requester_id' => $requester->id,
                'requester_profile_type' => 'affiliate',
                'title' => "Solicitação Jurídica $i",
                'description' => "Descrição detalhada da solicitação $i",
                'request_type' => 'Consultoria',
                'priority' => $priorities[array_rand($priorities)],
                'status' => $lStatuses[array_rand($lStatuses)],
                'level' => 'local'
            ]);
        }

        // 7. Events for Candidate
        $this->command->info('Creating Events...');
        foreach (range(1, 10) as $i) {
            Event::create([
                'candidate_id' => $candidateUser->id,
                'title' => "Comício no Bairro $i",
                'description' => "Descrição do comício $i",
                'location' => "Rua Principal, $i",
                'start_time' => now()->addDays(rand(-30, 30)),
                'end_time' => now()->addDays(rand(-30, 30))->addHours(2)
            ]);
        }

        // 8. Team Members for Candidate
        $this->command->info('Creating Team Members...');
        $teamRoles = ['Coordenador de Base', 'Cabo Eleitoral', 'Voluntário', 'Fiscal'];
        foreach (range(1, 15) as $i) {
            $memberUser = User::where('role', 'affiliate')->inRandomOrder()->first();
            if (!$memberUser) continue;

            CampaignTeamMember::updateOrCreate(
                ['candidate_id' => $candidateUser->id, 'user_id' => $memberUser->id],
                [
                    'role' => $teamRoles[array_rand($teamRoles)],
                    'is_active' => true
                ]
            );
        }

        // 9. Goals
        $this->command->info('Creating Goals...');
        Goal::updateOrCreate(['type' => 'state', 'location_name' => 'Brasil'], ['target_members' => 50000, 'current_members' => 12500, 'status' => 'on_track']);
        Goal::updateOrCreate(['type' => 'state', 'location_name' => 'RS'], ['target_members' => 5000, 'current_members' => 1200, 'status' => 'at_risk']);
        Goal::updateOrCreate(['type' => 'city', 'location_name' => 'Taquara'], ['target_members' => 500, 'current_members' => 450, 'status' => 'on_track']);

        // 10. Points
        $this->command->info('Creating Points...');
        foreach (range(1, 100) as $i) {
            $pUser = User::inRandomOrder()->first();
            if (!$pUser) continue;

            Point::create([
                'user_id' => $pUser->id,
                'amount' => rand(10, 500),
                'reason' => 'Atividade de teste'
            ]);
        }
        $this->command->info('SystemDataSeeder finished successfully!');
    }
}
