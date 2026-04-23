<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetitionSignature;
use Illuminate\Support\Facades\DB;

class PetitionController extends Controller
{
    public function show()
    {
        $stats = [
            'total' => PetitionSignature::count(),
            'by_city' => PetitionSignature::select('city', DB::raw('count(*) as count'))
                ->groupBy('city')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get(),
        ];

        return view('pages.public.petition', compact('stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petition_signatures,email',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'whatsapp' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|unique:petition_signatures,cpf',
        ], [
            'email.unique' => 'Este e-mail já registrou sua assinatura no abaixo-assinado.',
            'cpf.unique' => 'Este CPF já registrou sua assinatura.',
        ]);

        PetitionSignature::create($request->all());

        return redirect()->back()->with('success', 'Sua assinatura foi registrada com sucesso! Vamos juntos pressionar por uma água de qualidade.');
    }
}
