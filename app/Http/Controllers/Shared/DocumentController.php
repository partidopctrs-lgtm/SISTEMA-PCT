<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $portals = $this->getDocStructure();
        $currentPortal = $request->get('portal', auth()->user()->role);

        // Se o usuário não for admin, ele só vê o portal dele ou o institucional
        if (auth()->user()->role !== 'admin' && !in_array($currentPortal, [auth()->user()->role, 'institucional'])) {
            $currentPortal = auth()->user()->role;
        }

        return view('pages.shared.documents', compact('portals', 'currentPortal'));
    }

    private function getDocStructure()
    {
        return [
            'institucional' => [
                'name' => 'Institucional',
                'color' => '#1B4FA8',
                'desc' => 'Representação pública e valores do PCT',
                'categories' => [
                    'Identidade' => [
                        ['name' => 'Manifesto do Movimento', 'type' => 'Manifesto', 'status' => 'Aprovado', 'tpl' => 'manifesto'],
                        ['name' => 'Missão, Visão e Valores', 'type' => 'Institucional', 'status' => 'Aprovado', 'tpl' => 'missao'],
                        ['name' => 'Carta de Princípios', 'type' => 'Carta', 'status' => 'Aprovado', 'tpl' => 'carta_principios'],
                    ],
                    'Regulamentos' => [
                        ['name' => 'Regulamento Geral', 'type' => 'Regulamento', 'status' => 'Aprovado', 'tpl' => 'gen'],
                    ]
                ]
            ],
            'administrativo' => [
                'name' => 'Administrativo',
                'color' => '#534AB7',
                'desc' => 'Centro de controle operacional',
                'categories' => [
                    'Governança' => [
                        ['name' => 'Regimento Interno', 'type' => 'Regimento', 'status' => 'Aprovado', 'tpl' => 'regimento'],
                        ['name' => 'Manual de Operação', 'type' => 'Manual', 'status' => 'Rascunho', 'tpl' => 'gen'],
                    ]
                ]
            ],
            'finance' => [
                'name' => 'Financeiro',
                'color' => '#854F0B',
                'desc' => 'Controle financeiro e transparência',
                'categories' => [
                    'Modelos' => [
                        ['name' => 'Termo de Doação', 'type' => 'Termo', 'status' => 'Aprovado', 'tpl' => 'termo_doacao'],
                        ['name' => 'Registro de Receitas', 'type' => 'Registro', 'status' => 'Aprovado', 'tpl' => 'receitas'],
                    ]
                ]
            ],
            'legal' => [
                'name' => 'Jurídico',
                'color' => '#0F6E56',
                'desc' => 'Validação legal e compliance',
                'categories' => [
                    'Fundação' => [
                        ['name' => 'Estatuto Social', 'type' => 'Estatuto', 'status' => 'Aprovado', 'tpl' => 'estatuto'],
                        ['name' => 'Termo de Filiação', 'type' => 'Termo', 'status' => 'Aprovado', 'tpl' => 'termo_filiacao'],
                    ]
                ]
            ],
            'candidate' => [
                'name' => 'Candidato',
                'color' => '#993556',
                'desc' => 'Gestão de candidatos',
                'categories' => [
                    'Cadastro' => [
                        ['name' => 'Ficha de Candidatura', 'type' => 'Ficha', 'status' => 'Aprovado', 'tpl' => 'ficha_candidatura'],
                    ]
                ]
            ],
            'committee' => [
                'name' => 'Comitê',
                'color' => '#228B2F',
                'desc' => 'Gestão e operação local',
                'categories' => [
                    'Atas' => [
                        ['name' => 'Ata de Fundação do Diretório', 'type' => 'Ata', 'status' => 'Aprovado', 'tpl' => 'ata_fundacao'],
                        ['name' => 'Ata de Reunião', 'type' => 'Ata', 'status' => 'Aprovado', 'tpl' => 'ata_reuniao'],
                    ]
                ]
            ],
            'communication' => [
                'name' => 'Comunicação',
                'color' => '#993C1D',
                'desc' => 'Mensagem e mobilização',
                'categories' => [
                    'Modelos' => [
                        ['name' => 'Comunicado Oficial', 'type' => 'Comunicado', 'status' => 'Aprovado', 'tpl' => 'comunicado'],
                        ['name' => 'Nota Pública', 'type' => 'Nota', 'status' => 'Aprovado', 'tpl' => 'nota_publica'],
                    ]
                ]
            ],
        ];
    }
}
