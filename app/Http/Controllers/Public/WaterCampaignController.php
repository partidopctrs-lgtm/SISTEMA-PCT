<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterReport;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class WaterCampaignController extends Controller
{
    public function index(Request $request)
    {
        // Guardar o ID do afiliado na sessão se vier via ref
        if ($request->has('ref')) {
            session(['water_ref' => $request->ref]);
        }

        // Estatísticas para o painel de impacto
        $stats = [
            'total_reports' => WaterReport::count(),
            'cities_affected' => WaterReport::distinct('city')->count(),
            'types' => WaterReport::selectRaw('problem_type, count(*) as count')
                ->groupBy('problem_type')
                ->get()
        ];

        return view('pages.public.campaigns.water-rs', compact('stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'neighborhood' => 'required|string|max:100',
            'problem_type' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'contact' => 'required|string|max:20',
            'photo' => 'nullable|image|max:5120', // 5MB
        ]);

        $affiliateId = session('water_ref');
        
        // Se o ref não estiver na sessão mas vier no formulário oculto
        if (!$affiliateId && $request->affiliate_id) {
            $affiliateId = $request->affiliate_id;
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('water_campaign', 'public');
        }

        WaterReport::create([
            'name' => $request->name,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'problem_type' => $request->problem_type,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'contact' => $request->contact,
            'photo' => $photoPath,
            'affiliate_id' => $affiliateId
        ]);

        return redirect()->back()->with('success', 'Seu relato foi registrado com sucesso! O PCT levará essa demanda adiante.');
    }
}
