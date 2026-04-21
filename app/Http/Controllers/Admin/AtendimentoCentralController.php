<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaterReport;
use App\Models\ReportNote;
use App\Models\ReportForwarding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendimentoCentralController extends Controller
{
    /**
     * Dashboard da Central de Atendimento
     */
    public function dashboard()
    {
        $stats = [
            'total' => WaterReport::count(),
            'urgent' => WaterReport::where('is_urgent', true)->count(),
            'triage' => WaterReport::where('status', 'recebido')->count(),
            'in_analysis' => WaterReport::where('status', 'em análise')->count(),
            'resolved' => WaterReport::where('status', 'finalizado')->count(),
        ];

        $reportsByCity = WaterReport::select('city', DB::raw('count(*) as total'))
            ->groupBy('city')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $recentReports = WaterReport::with('affiliate')->latest()->limit(5)->get();

        return view('pages.admin.atendimento.dashboard', compact('stats', 'reportsByCity', 'recentReports'));
    }

    /**
     * Central de Ocorrências (Lista Geral)
     */
    public function index(Request $request)
    {
        $query = WaterReport::with('affiliate');

        if ($request->has('status')) $query->where('status', $request->status);
        if ($request->has('city')) $query->where('city', 'like', "%{$request->city}%");
        if ($request->has('gravity')) $query->where('gravity', $request->gravity);

        $reports = $query->latest()->paginate(25);
        return view('pages.admin.atendimento.index', compact('reports'));
    }

    /**
     * Fila de Triagem
     */
    public function triage()
    {
        $reports = WaterReport::where('status', 'recebido')->latest()->paginate(15);
        return view('pages.admin.atendimento.triage', compact('reports'));
    }

    /**
     * Detalhes do Caso (Visão Admin)
     */
    public function show($id)
    {
        $report = WaterReport::with(['evidences', 'notes.user', 'forwardings.sender', 'affiliate'])->findOrFail($id);
        return view('pages.admin.atendimento.show', compact('report'));
    }

    /**
     * Adicionar Nota Interna
     */
    public function addNote(Request $request, $id)
    {
        $request->validate(['content' => 'required|string']);

        ReportNote::create([
            'water_report_id' => $id,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'is_internal' => $request->has('is_internal')
        ]);

        return back()->with('success', 'Nota adicionada com sucesso.');
    }

    /**
     * Atualizar Status do Caso
     */
    public function updateStatus(Request $request, $id)
    {
        $report = WaterReport::findOrFail($id);
        $report->update(['status' => $request->status]);

        return back()->with('success', "Status atualizado para: {$request->status}");
    }

    /**
     * Encaminhar para Setor
     */
    public function forward(Request $request, $id)
    {
        $request->validate([
            'to_sector' => 'required|string',
            'reason' => 'required|string'
        ]);

        ReportForwarding::create([
            'water_report_id' => $id,
            'from_user_id' => auth()->id(),
            'to_sector' => $request->to_sector,
            'reason' => $request->reason,
        ]);

        // Automates status change when forwarded
        WaterReport::where('id', $id)->update(['status' => 'encaminhado']);

        return back()->with('success', "Caso encaminhado para o setor: {$request->to_sector}");
    }

    /**
     * Mobilização: Agrupar Casos Similares
     */
    public function mobilization()
    {
        $clusters = WaterReport::select('city', 'problem_type', DB::raw('count(*) as total'))
            ->groupBy('city', 'problem_type')
            ->having('total', '>', 1)
            ->orderByDesc('total')
            ->get();

        return view('pages.admin.atendimento.mobilization', compact('clusters'));
    }
}
