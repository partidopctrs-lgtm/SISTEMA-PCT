<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicDemand;
use Illuminate\Support\Str;

class PublicDemandController extends Controller
{
    public function create()
    {
        $demands = PublicDemand::where('user_id', auth()->id())->get();
        $canCreate = $demands->count() < 2;
        
        return view('pages.affiliate.demands.create', compact('demands', 'canCreate'));
    }

    public function store(Request $request)
    {
        $userDemandsCount = PublicDemand::where('user_id', auth()->id())->count();
        if ($userDemandsCount >= 2) {
            return redirect()->back()->with('error', 'Você já atingiu o limite de 2 demandas ativas.');
        }

        $request->validate([
            'city' => 'required|string',
            'state' => 'required|string|max:2',
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,docx,jpg,png|max:5120',
        ]);

        $protocol = 'DM-' . strtoupper(Str::random(8));
        
        $path = null;
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('public_demands/' . auth()->id());
        }

        // Verifica Gatilho de Urgência (ex: 5 demandas na mesma cidade e categoria)
        $similarDemands = PublicDemand::where('city', $request->city)
                                      ->where('category', $request->category)
                                      ->count();
                                      
        $isUrgent = ($similarDemands + 1) >= 5;

        PublicDemand::create([
            'user_id' => auth()->id(),
            'city' => $request->city,
            'state' => $request->state,
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'attachment_path' => $path,
            'protocol_number' => $protocol,
            'status' => 'analise',
            'is_urgent' => $isUrgent,
        ]);

        // Simulação de geração de PDF (aqui pode-se ligar o dompdf)
        
        return redirect()->route('affiliate.demands.create')->with('success', 'Demanda enviada! Seu protocolo de acompanhamento é: ' . $protocol);
    }
}
