<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Generate the membership support PDF for a user.
     */
    public function generateSupportPdf(Request $request, $userId = null)
    {
        // If no user ID provided, use the authenticated user
        $user = $userId ? User::findOrFail($userId) : $request->user();

        // Check if user has necessary data (CPF, RG, etc.)
        if (!$user->cpf || !$user->rg) {
            return response()->json([
                'error' => 'Missing profile data. Please complete your profile before generating the form.'
            ], 400);
        }

        $pdf = Pdf::loadView('pdf.membership-support', compact('user'));

        return $pdf->download("Apoio_PCT_{$user->registration_number}.pdf");
    }

    /**
     * Stream the PDF to the browser instead of downloading.
     */
    public function streamSupportPdf(Request $request, $userId = null)
    {
        $user = $userId ? User::findOrFail($userId) : $request->user();

        $pdf = Pdf::loadView('pdf.membership-support', compact('user'));

        return $pdf->stream("Apoio_PCT_{$user->registration_number}.pdf");
    }
}
