<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModuleProgress;

class AffiliateDashboardController extends Controller
{
    public function index()
    {
        return view('pages.affiliate.dashboard');
    }

    public function profile()
    {
        return view('pages.affiliate.profile');
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
        return view('pages.affiliate.convites');
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
        return view('pages.affiliate.eventos');
    }

    public function financeiro()
    {
        return view('pages.affiliate.financeiro');
    }

    public function suporte()
    {
        return view('pages.affiliate.suporte');
    }

    public function configuracoes()
    {
        return view('pages.affiliate.configuracoes');
    }
}
