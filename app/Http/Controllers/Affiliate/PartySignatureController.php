<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartySignature;
use Illuminate\Support\Str;

class PartySignatureController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        $signatures = PartySignature::where('user_id', $user->id)->get();
        $goal = 500000;
        
        // Contabiliza APENAS as assinaturas oficiais na tabela party_signatures
        $current = PartySignature::count();
        $remaining = $goal - $current;
        $progress = ($current / $goal) * 100;
        
        return view('pages.affiliate.signatures.create', compact('signatures', 'goal', 'current', 'progress', 'remaining'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Verifica se já assinou
        if (PartySignature::where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Você já registrou seu apoio oficial!');
        }

        $request->validate([
            'full_name' => 'required|string|max:255',
            'cpf' => 'required|string',
            'voter_title' => 'required|string',
            'voter_zone' => 'required|string',
            'voter_section' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:2',
        ]);

        // Se o CPF já existe na tabela de assinaturas para outro usuário
        if (PartySignature::where('cpf', $request->cpf)->where('user_id', '!=', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Este CPF já foi utilizado em outra assinatura.');
        }

        $protocol = strtoupper(Str::random(10));

        // Salva EXCLUSIVAMENTE na tabela de apoios, sem alterar o cadastro principal do usuário
        PartySignature::create([
            'user_id' => $user->id,
            'full_name' => $request->full_name,
            'cpf' => $request->cpf,
            'voter_title' => $request->voter_title,
            'city' => $request->city,
            'state' => strtoupper($request->state),
            'protocol_number' => $protocol,
            'status' => 'pendente',
        ]);

        return redirect()->route('affiliate.signatures.create')->with('success', 'Apoio registrado com sucesso! Protocolo: ' . $protocol);
    }
}
