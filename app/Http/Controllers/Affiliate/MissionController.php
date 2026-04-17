<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function show($slug)
    {
        $missions = [
            'educacao' => [
                'title' => 'Educação: Estudar Manifesto',
                'description' => 'Leia o manifesto completo e responda ao quiz de avaliação.',
                'points' => 100,
                'view' => 'pages.affiliate.missions.education'
            ],
            'marketing' => [
                'title' => 'Marketing: Divulgação Digital',
                'description' => 'Compartilhe o vídeo institucional em 3 redes sociais diferentes.',
                'points' => 150,
                'view' => 'pages.affiliate.missions.marketing'
            ],
            'social' => [
                'title' => 'Social: Ação Comunitária',
                'description' => 'Identifique um problema local e sugira uma solução liberal no fórum.',
                'points' => 300,
                'view' => 'pages.affiliate.missions.social'
            ],
            'expansao' => [
                'title' => 'Expansão: Indicação Diária',
                'description' => 'Envie seu link de convite para 5 novos contatos hoje.',
                'points' => 50,
                'view' => 'pages.affiliate.missions.expansion'
            ]
        ];

        if (!isset($missions[$slug])) {
            abort(404);
        }

        $mission = $missions[$slug];
        return view('pages.affiliate.missions.template', compact('mission'));
    }

    public function participate(Request $request, $slug)
    {
        // Logic to mark mission as in progress
        return back()->with('success', 'Missão iniciada com sucesso! Siga as instruções abaixo.');
    }

    public function submitEvidence(Request $request, $slug)
    {
        $request->validate([
            'evidence_link' => 'nullable|url',
            'evidence_file' => 'nullable|image|max:2048',
        ]);

        // Logic to store evidence and notify admin for validation
        return redirect()->route('affiliate.dashboard')->with('success', 'Evidência enviada com sucesso! Aguarde a validação do Núcleo de Marketing para receber seus +150 pontos.');
    }
}
