<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartySignature;
use Barryvdh\DomPDF\Facade\Pdf;

class SignaturePdfController extends Controller
{
    // ──────────────────────────────────────────────────────────────────────
    // LOTE — todas as fichas, uma por página
    // Rota sugerida: GET /admin/signatures/export/pdf
    // ──────────────────────────────────────────────────────────────────────
    public function exportSignaturesPdf()
    {
        // Carrega os apoios com o relacionamento user
        $signatures = PartySignature::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = Pdf::loadView(
            'pages.admin.reports.fichas_lote_pdf',   // <-- view de LOOP
            ['signatures' => $signatures]
        )
        ->setPaper('a4', 'portrait')
        ->setOption('defaultFont', 'sans-serif')
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isRemoteEnabled', true);       // necessário para public_path()

        return $pdf->download('Fichas_Apoio_PCT_Lote_' . date('Ymd_Hi') . '.pdf');
    }

    // ──────────────────────────────────────────────────────────────────────
    // INDIVIDUAL — uma ficha por protocolo
    // Rota sugerida: GET /admin/signatures/{id}/pdf
    // ──────────────────────────────────────────────────────────────────────
    public function exportOnePdf(int $id)
    {
        $sig = PartySignature::with('user')->findOrFail($id);

        $pdf = Pdf::loadView(
            'pages.admin.reports.ficha_apoio_pct',  // <-- view da ficha individual
            ['sig' => $sig]
        )
        ->setPaper('a4', 'portrait')
        ->setOption('defaultFont', 'sans-serif')
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isRemoteEnabled', true);

        $filename = 'Ficha_PCT_' . $sig->protocol_number . '.pdf';
        return $pdf->download($filename);
    }

    // ──────────────────────────────────────────────────────────────────────
    // MEMBRO — Ficha de Filiação Oficial
    // ──────────────────────────────────────────────────────────────────────
    public function exportMemberPdf(int $userId)
    {
        $user = \App\Models\User::findOrFail($userId);
        
        $pdf = Pdf::loadView(
            'pages.admin.reports.member-sheet-pdf',
            ['user' => $user]
        )
        ->setPaper('a4', 'portrait')
        ->setOption('defaultFont', 'sans-serif')
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isRemoteEnabled', true);

        return $pdf->download('Ficha_Filiacao_' . $user->registration_number . '.pdf');
    }
}
