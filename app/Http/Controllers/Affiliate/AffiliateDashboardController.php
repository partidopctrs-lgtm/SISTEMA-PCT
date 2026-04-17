<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModuleProgress;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AffiliateDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isFounder = ($user->email === 'viniamaral2026@gmail.com');
        
        $stats = [
            'total_members' => \App\Models\User::count(),
            'total_directories' => \App\Models\Directory::count(),
            'my_referrals' => $user->referrals()->count(),
            'my_points' => $user->referrals()->count() * 50, // 50 points per referral
            'rank_national' => 1,
        ];

        $myReferrals = $user->referrals()->latest()->limit(5)->get();

        return view('pages.affiliate.dashboard', compact('user', 'isFounder', 'stats', 'myReferrals'));
    }

    public function profile()
    {
        return view('pages.affiliate.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:20',
            'rg' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:50',
            'marital_status' => 'nullable|string|max:50',
            'voter_id' => 'nullable|string|max:30',
            'voter_zone' => 'nullable|string|max:10',
            'voter_section' => 'nullable|string|max:10',
            'profession' => 'nullable|string|max:100',
            'education' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:2',
            'zip_code' => 'nullable|string|max:15',
            'committee_city' => 'nullable|string|max:100',
        ]);

        $user->update($validated);

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|string', // Base64 image from cropper
        ]);

        $user = auth()->user();
        
        // Remove old photo if exists
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $image = $request->photo;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'avatars/' . Str::random(10) . '_' . time() . '.png';

        if (!Storage::disk('public')->exists('avatars')) {
            Storage::disk('public')->makeDirectory('avatars');
        }

        Storage::disk('public')->put($imageName, base64_decode($image));

        $user->update([
            'photo' => $imageName
        ]);

        return response()->json([
            'success' => true,
            'photo_url' => asset('storage/' . $imageName)
        ]);
    }

    public function carteirinha()
    {
        return view('pages.affiliate.carteirinha');
    }

    public function escola()
    {
        $modules = $this->getModules();
        $completedModuleIds = ModuleProgress::where('user_id', auth()->id())
            ->pluck('module_id')
            ->toArray();

        return view('pages.affiliate.escola', compact('modules', 'completedModuleIds'));
    }

    public function aula($id)
    {
        $modules = $this->getModules();
        $module = collect($modules)->firstWhere('id', $id);

        if (!$module) {
            abort(404);
        }

        // Bloqueio Sequencial: Verificar se o mÃ³dulo anterior foi concluÃ­do
        if ($id > 1) {
            $previousCompleted = ModuleProgress::where('user_id', auth()->id())
                ->where('module_id', $id - 1)
                ->exists();

            if (!$previousCompleted) {
                return redirect()->route('affiliate.escola')
                    ->with('error', 'VocÃª precisa concluir o MÃ³dulo ' . ($id - 1) . ' antes de acessar esta aula.');
            }
        }

        $completedModuleIds = ModuleProgress::where('user_id', auth()->id())
            ->pluck('module_id')
            ->toArray();

        return view('pages.affiliate.aula', compact('module', 'modules', 'completedModuleIds'));
    }

    public function checkAula(Request $request, $id)
    {
        $modules = $this->getModules();
        $module = collect($modules)->firstWhere('id', $id);

        if (!$module) {
            abort(404);
        }

        $request->validate([
            'answer' => 'required|integer',
        ]);

        if ($request->answer == $module['correct_answer']) {
            // Registrar progresso APENAS se acertar
            ModuleProgress::updateOrCreate([
                'user_id' => auth()->id(),
                'module_id' => $id
            ], [
                'completed_at' => now()
            ]);

            return redirect()->route('affiliate.escola.aula', $id)
                ->with('success', 'Resposta correta! MÃ³dulo concluÃ­do com sucesso.');
        }

        return redirect()->route('affiliate.escola.aula', $id)
            ->with('error_quiz', 'Resposta incorreta. Por favor, revise o conteÃºdo e tente novamente.');
    }

    public function certificado()
    {
        $completedCount = ModuleProgress::where('user_id', auth()->id())->count();

        if ($completedCount < 12) {
            return redirect()->route('affiliate.escola')
                ->with('error', 'VocÃª precisa concluir todos os 12 mÃ³dulos para liberar seu certificado.');
        }

        $user = auth()->user();
        return view('pages.affiliate.certificado', compact('user'));
    }    private function getModules()
    {
        return [
            [
                'id' => 1, 
                'title' => 'O QUE Ã‰ SER UM AFILIADO PCT', 
                'icon' => 'user-group',
                'content' => "Um afiliado do PCT nÃ£o Ã© apenas um participante â€” Ã© um representante do movimento.\n\nIsso significa:\n- Representar os valores do PCT\n- Agir com responsabilidade\n- Ser exemplo na comunidade\n- Buscar conhecimento constante\n\nðŸ‘‰ **Mentalidade:** menos discurso, mais atitude",
                'question' => 'Qual Ã© a mentalidade principal exigida de um afiliado do PCT?',
                'options' => [
                    'Desenvolver discursos polÃ­ticos complexos e teÃ³ricos.',
                    'Manter uma postura de passividade e apenas observar as aÃ§Ãµes.',
                    'Menos discurso e mais atitude na representaÃ§Ã£o do movimento.',
                    'Priorizar interesses pessoais acima dos valores do movimento.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 2, 
                'title' => 'COMO SE COMPORTAR (CONDUTA DO MEMBRO)', 
                'icon' => 'shield-check',
                'content' => "### PrincÃ­pios bÃ¡sicos\n- Respeito com todos (inclusive quem discorda)\n- Postura profissional\n- ComunicaÃ§Ã£o clara e educada\n- Evitar conflitos desnecessÃ¡rios\n- NÃ£o espalhar desinformaÃ§Ã£o\n\n### Comportamento pÃºblico\n- NÃ£o atacar pessoas â€” discutir ideias\n- NÃ£o usar linguagem agressiva\n- NÃ£o associar o PCT a extremismos\n- Sempre manter postura equilibrada\n\nðŸ‘‰ **Isso constrÃ³i credibilidade**",
                'question' => 'Como o afiliado deve se portar em discussÃµes pÃºblicas?',
                'options' => [
                    'Atacar oponentes pessoalmente para vencer o debate.',
                    'Discutir ideias sem atacar pessoas, mantendo postura equilibrada.',
                    'Usar linguagem agressiva para mostrar forÃ§a ideolÃ³gica.',
                    'Evitar qualquer tipo de comunicaÃ§Ã£o clara.'
                ],
                'correct_answer' => 1
            ],
            [
                'id' => 3, 
                'title' => 'O QUE O PCT DEFENDE (BASE IDEOLÃ“GICA)', 
                'icon' => 'light-bulb',
                'content' => "Todo afiliado precisa entender isso claramente:\n- Liberdade individual\n- ValorizaÃ§Ã£o do trabalho\n- Livre iniciativa\n- Menos burocracia\n- Estado eficiente (nÃ£o ausente, mas funcional)\n- Responsabilidade pessoal\n\nðŸ‘‰ **Sem isso, o movimento perde identidade**",
                'question' => 'Qual desses pilares faz parte da base ideolÃ³gica do PCT?',
                'options' => [
                    'Aumento da burocracia estatal.',
                    'Estado ausente em todas as Ã¡reas sociais.',
                    'Estado eficiente, funcional e valorizaÃ§Ã£o do trabalho.',
                    'Fim da livre iniciativa econÃ´mica.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 4, 
                'title' => 'COMO FALAR SOBRE O PCT', 
                'icon' => 'chat-bubble-bottom-center-text',
                'content' => "### Forma correta:\n- Simples\n- Direta\n- Sem termos difÃ­ceis\n\n### Exemplo:\nâ€œO PCT Ã© um movimento que forma pessoas para melhorar o Brasil com base em trabalho, liberdade e responsabilidade.â€�\n\nâ�Œ **Evitar:**\n- Discurso agressivo\n- Linguagem ideolÃ³gica pesada\n- Promessas irreais",
                'question' => 'Qual Ã© a forma recomendada de falar sobre o movimento?',
                'options' => [
                    'Usar termos acadÃªmicos e difÃ­ceis para parecer intelectual.',
                    'Utilizar um discurso agressivo para convencer as pessoas.',
                    'Forma simples, direta e sem termos difÃ­ceis.',
                    'Fazer promessas irreais para atrair membros rapidamente.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 5, 
                'title' => 'COMO TRAZER NOVOS MEMBROS', 
                'icon' => 'user-plus',
                'content' => "### MÃ©todo simples:\n- Conversar (nÃ£o impor)\n- Explicar o movimento\n- Mostrar propÃ³sito\n- Convidar para entrar\n\n### Ferramentas:\n- Link de cadastro\n- Redes sociais\n- Conversas presenciais",
                'question' => 'Qual Ã© o mÃ©todo correto sugerido para trazer novos membros?',
                'options' => [
                    'Impor a entrada de novos membros atravÃ©s de pressÃ£o.',
                    'Conversar sem impor, explicar o movimento e mostrar propÃ³sito.',
                    'Apenas enviar o link de cadastro sem explicar do que se trata.',
                    'Falar apenas com pessoas que jÃ¡ concordam 100% com tudo.'
                ],
                'correct_answer' => 1
            ],
            [
                'id' => 6, 
                'title' => 'COMO ORGANIZAR REUNIÃ•ES', 
                'icon' => 'calendar-days',
                'content' => "### Estrutura bÃ¡sica:\n1. Abertura (5 min)\n2. ApresentaÃ§Ã£o do PCT\n3. DiscussÃ£o de ideias\n4. DefiniÃ§Ã£o de aÃ§Ãµes\n5. Encerramento\n\n### Regras:\n- ComeÃ§ar no horÃ¡rio\n- Evitar bagunÃ§a\n- Ter objetivo claro\n- Registrar decisÃµes",
                'question' => 'Qual regra Ã© fundamental para organizar uma reuniÃ£o eficiente?',
                'options' => [
                    'Permitir que a reuniÃ£o se estenda sem horÃ¡rio definido.',
                    'NÃ£o registrar as decisÃµes tomadas para manter a informalidade.',
                    'ComeÃ§ar no horÃ¡rio, evitar bagunÃ§a e ter objetivo claro.',
                    'Focar apenas na discussÃ£o de ideias, sem definir aÃ§Ãµes.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 7, 
                'title' => 'COMO FORMAR UM NÃšCLEO / DIRETÃ“RIO', 
                'icon' => 'rectangle-group',
                'content' => "### Passo a passo:\n1. Ter grupo mÃ­nimo (3 a 10 pessoas)\n2. Definir responsÃ¡vel local\n3. Criar grupo de comunicaÃ§Ã£o (WhatsApp)\n4. Fazer reuniÃµes regulares\n5. Registrar membros\n\n### Estrutura inicial:\n- Coordenador\n- Vice\n- ComunicaÃ§Ã£o\n- OrganizaÃ§Ã£o",
                'question' => 'Qual o nÃºmero mÃ­nimo recomendado de pessoas para formar um nÃºcleo?',
                'options' => [
                    'Pelo menos 100 pessoas.',
                    'Entre 3 a 10 pessoas.',
                    'Apenas 1 pessoa (o lÃ­der).',
                    'NÃ£o hÃ¡ necessidade de um grupo fixo.'
                ],
                'correct_answer' => 1
            ],
            [
                'id' => 8, 
                'title' => 'RESPONSABILIDADE DO LÃ�DER', 
                'icon' => 'academic-cap',
                'content' => "Se o afiliado virar lÃ­der:\n- Organizar reuniÃµes\n- Motivar membros\n- Garantir disciplina\n- Representar o PCT localmente\n\nðŸ‘‰ **LideranÃ§a = responsabilidade, nÃ£o status**",
                'question' => 'O que define a lideranÃ§a dentro do PCT?',
                'options' => [
                    'O status social e a posiÃ§Ã£o de comando.',
                    'Responsabilidade em organizar, motivar e garantir disciplina.',
                    'Poder para tomar decisÃµes sozinho sem ouvir o grupo.',
                    'Apenas a representaÃ§Ã£o em eventos nacionais.'
                ],
                'correct_answer' => 1
            ],
            [
                'id' => 9, 
                'title' => 'ERROS QUE DEVEM SER EVITADOS', 
                'icon' => 'exclamation-triangle',
                'content' => "- Falar sem conhecer o movimento\n- Criar conflitos desnecessÃ¡rios\n- Misturar o PCT com outras ideologias\n- Prometer coisas que nÃ£o pode cumprir\n- Falta de organizaÃ§Ã£o",
                'question' => 'Qual erro deve ser evitado por um membro ativo?',
                'options' => [
                    'Conhecer o movimento antes de falar sobre ele.',
                    'Manter a organizaÃ§Ã£o constante das atividades.',
                    'Prometer coisas que nÃ£o pode cumprir ou criar conflitos desnecessÃ¡rios.',
                    'Diferenciar o PCT de outras ideologias.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 10, 
                'title' => 'CAMINHO DE CRESCIMENTO NO PCT', 
                'icon' => 'chart-bar',
                'content' => "A evoluÃ§Ã£o natural do membro:\n1. Afiliado\n2. Membro ativo\n3. LÃ­der local\n4. CoordenaÃ§Ã£o regional\n5. LideranÃ§a nacional\n\nðŸ‘‰ **Mostra que existe evoluÃ§Ã£o real**",
                'question' => 'Qual Ã© o primeiro passo no caminho de crescimento do movimento?',
                'options' => [
                    'LideranÃ§a nacional.',
                    'CoordenaÃ§Ã£o regional.',
                    'Tornar-se um Afiliado.',
                    'Tornar-se um Membro de Elite.'
                ],
                'correct_answer' => 2
            ],
            [
                'id' => 11, 
                'title' => 'DISCIPLINA E COMPROMISSO', 
                'icon' => 'clock',
                'content' => "O crescimento do PCT depende de:\n- OrganizaÃ§Ã£o\n- FrequÃªncia\n- ConstÃ¢ncia\n- Compromisso real\n\nðŸ‘‰ **Movimento forte = membros disciplinados**",
                'question' => 'O que Ã© necessÃ¡rio para fortalecer o movimento?',
                'options' => [
                    'Atuar apenas em perÃ­odos eleitorais.',
                    'FrequÃªncia, constÃ¢ncia e compromisso real dos membros.',
                    'Depender apenas das mÃ­dias sociais para crescer.',
                    'Reduzir a organizaÃ§Ã£o para agilizar processos.'
                ],
                'correct_answer' => 1
            ],
            [
                'id' => 12, 
                'title' => 'MENSAGEM FINAL', 
                'icon' => 'flag',
                'content' => "O PCT nÃ£o Ã© apenas um movimento polÃ­tico. Ã‰ um grupo de pessoas que decidiram agir com responsabilidade para construir um paÃ­s melhor. Cada afiliado Ã© parte dessa construÃ§Ã£o.\n\nðŸŽ‰ **ParabÃ©ns! VocÃª concluiu a FormaÃ§Ã£o Oficial.** JÃ¡ pode emitir seu certificado.",
                'question' => 'O que o PCT representa alÃ©m de um movimento polÃ­tico?',
                'options' => [
                    'Apenas uma sigla para disputar cargos.',
                    'Um grupo de pessoas agindo com responsabilidade por um paÃ­s melhor.',
                    'Um clube social focado em eventos.',
                    'Uma organizaÃ§Ã£o focada exclusivamente em burocracia.'
                ],
                'correct_answer' => 1
            ],
        ];
    }

    public function missoes()
    {
        return view('pages.affiliate.missoes');
    }

    public function convites()
    {
        $myReferrals = auth()->user()->referrals()->latest()->get();
        return view('pages.affiliate.convites', compact('myReferrals'));
    }

    public function storeManualRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'required|string|max:20|unique:users',
            'phone' => 'required|string|max:20',
            'document' => 'required|mimes:pdf,doc,docx|max:5120', // Max 5MB
        ]);

        $affiliate = auth()->user();
        
        // Handle document upload
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('registration_documents', 'public');
        }

        // Generate a standard password based on the first 6 digits of the CPF
        $cpfDigits = preg_replace('/[^0-9]/', '', $request->cpf);
        $passwordStr = substr($cpfDigits, 0, 6);
        if (strlen($passwordStr) < 6) {
            $passwordStr = 'pct2026';
        }

        // Generate PCT ID
        $lastUser = \App\Models\User::orderBy('id', 'desc')->first();
        $nextId = $lastUser ? $lastUser->id + 1 : 1;
        $pctId = 'PCT-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        $newUser = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($passwordStr),
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'role' => 'affiliate',
            'pct_id' => $pctId,
            'referred_by' => $affiliate->id,
            'registration_document' => $documentPath,
            // Inherit location data from the affiliate
            'city' => $affiliate->city,
            'state' => $affiliate->state,
            'committee_city' => $affiliate->committee_city,
            'committee_id' => $affiliate->committee_id,
        ]);

        // Create Profile and Membership
        $newUser->profiles()->create([
            'profile_type' => 'affiliate',
            'level' => 'local',
            'is_primary' => true
        ]);

        $newUser->memberships()->create([
            'directory_id' => $affiliate->committee_id,
            'membership_status' => 'active',
            'joined_at' => now(),
            'source' => 'manual_referral'
        ]);

        // Notify the Committee (if exists)
        if ($affiliate->committee_id) {
            \App\Models\Notification::create([
                'user_id' => 1, // Let's assume user_id 1 is the national admin or we target the committee presidents. For now we use the general relation.
                'related_module' => 'committee',
                'related_id' => $affiliate->committee_id,
                'title' => 'Novo Filiado Registrado (Campo)',
                'message' => "O afiliado {$affiliate->name} registrou manualmente {$newUser->name}.",
                'type' => 'info'
            ]);
        }

        return redirect()->route('affiliate.convites')->with('success', "Filiado {$newUser->name} registrado com sucesso! A senha padrão de acesso dele são os 6 primeiros dígitos do CPF.");
    }

    public function comunidade()
    {
        return view('pages.affiliate.comunidade');
    }

    public function documentos()
    {
        return view('pages.affiliate.documentos');
    }

    public function membershipForm()
    {
        return view('pages.shared.ficha-filiacao');
    }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function eventos()
    {
        $events = \App\Models\Event::where('start_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->get();
            
        return view('pages.affiliate.eventos', compact('events'));
    }

    public function financeiro()
    {
        $user = auth()->user();
        
        // Se o afiliado estiver em um comitê, mostra as finanças do comitê. 
        // Caso contrário, mostra o Nacional
        $committeeId = $user->committee_id;

        $query = \App\Models\FinancialRecord::where('status', 'approved');
        
        if ($committeeId) {
            $query->where('directory_id', $committeeId);
        } else {
            $query->whereNull('directory_id');
        }

        $records = $query->latest()->get();

        $totalIncome = $records->where('type', 'income')->sum('amount');
        $totalExpense = $records->where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        $schoolInvestment = $records->where('type', 'expense')->where('category', 'education')->sum('amount');
        $reserveFund = $records->where('type', 'income')->where('category', 'reserve')->sum('amount'); // or static logic for now

        return view('pages.affiliate.financeiro', compact('records', 'totalIncome', 'totalExpense', 'balance', 'schoolInvestment', 'reserveFund'));
    }

    public function suporte()
    {
        $legalRequestsCount = \App\Models\LegalRequest::where('requester_id', auth()->id())->count();
        $activeLegalRequests = \App\Models\LegalRequest::where('requester_id', auth()->id())
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->get();

        return view('pages.affiliate.suporte', compact('legalRequestsCount', 'activeLegalRequests'));
    }

    public function storeLegalRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'request_type' => 'required|string',
            'priority' => 'required|string|in:low,medium,high,urgent',
        ]);

        $legalRequest = \App\Models\LegalRequest::create([
            'request_code' => 'JUR-' . strtoupper(bin2hex(random_bytes(3))),
            'requester_id' => auth()->id(),
            'requester_profile_type' => 'affiliate',
            'directory_id' => auth()->user()->committee_id, // Associar ao comitê do usuário se houver
            'title' => $request->title,
            'description' => $request->description,
            'request_type' => $request->request_type,
            'priority' => $request->priority,
            'status' => 'new',
            'level' => 'local',
        ]);

        return redirect()->back()->with('success', 'Sua solicitação jurídica foi enviada com sucesso ao departamento.');
    }

    public function configuracoes()
    {
        return view('pages.affiliate.configuracoes');
    }
}
