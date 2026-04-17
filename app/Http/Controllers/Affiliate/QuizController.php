<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function manifesto()
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Qual é o pilar central da economia defendida pelo PCT?',
                'options' => [
                    'A' => 'Controle estatal total',
                    'B' => 'Liberdade econômica e desburocratização',
                    'C' => 'Economia baseada em subsídios infinitos',
                    'D' => 'Proibição da propriedade privada'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 2,
                'question' => 'Sobre a gestão pública, o que o PCT prioriza?',
                'options' => [
                    'A' => 'Aumento de cargos políticos',
                    'B' => 'Eficiência administrativa e foco no cidadão',
                    'C' => 'Extinção de todos os serviços públicos',
                    'D' => 'Manutenção de privilégios'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 3,
                'question' => 'Qual é a visão do PCT sobre o trabalho?',
                'options' => [
                    'A' => 'O trabalho é um fardo estatal',
                    'B' => 'O trabalho é o motor da dignidade e prosperidade',
                    'C' => 'Deve ser substituído por renda básica universal sem critérios',
                    'D' => 'Não deve haver incentivo ao empreendedorismo'
                ],
                'correct' => 'B'
            ]
        ];

        return view('pages.affiliate.quiz.manifesto', compact('questions'));
    }

    public function submitManifesto(Request $request)
    {
        // Simple validation logic (for now just redirect with success)
        return redirect()->route('affiliate.dashboard')->with('success', 'Quiz concluído! Você ganhou +100 pontos por dominar o Manifesto.');
    }
}
