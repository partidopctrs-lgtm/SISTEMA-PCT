<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\WaterReport;
use App\Models\ReportEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AtendimentoController extends Controller
{
    public function index()
    {
        $reports = WaterReport::where('affiliate_id', auth()->id())->latest()->paginate(15);
        return view('pages.affiliate.atendimento.index', compact('reports'));
    }

    public function create()
    {
        return view('pages.affiliate.atendimento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'problem_type' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'contact' => 'required|string',
            'evidences.*' => 'nullable|file|max:20480', // 20MB max per file
        ]);

        $report = WaterReport::create([
            'name' => $request->name,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'problem_type' => $request->problem_type,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'contact' => $request->contact,
            'affiliate_id' => auth()->id(),
            'status' => 'recebido',
            'gravity' => $request->gravity ?? 'baixa',
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_urgent' => $request->has('is_urgent'),
            'is_collective' => $request->has('is_collective'),
            'is_recurrent' => $request->has('is_recurrent'),
        ]);

        if ($request->hasFile('evidences')) {
            foreach ($request->file('evidences') as $file) {
                $path = $file->store('reports/evidences', 'public');
                $type = $this->getFileType($file);
                
                ReportEvidence::create([
                    'water_report_id' => $report->id,
                    'file_path' => $path,
                    'file_type' => $type,
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('affiliate.atendimento.index')->with('success', "Relato enviado! Protocolo: {$report->protocol}");
    }

    public function show($id)
    {
        $report = WaterReport::with('evidences')->findOrFail($id);
        return view('pages.affiliate.atendimento.show', compact('report'));
    }

    public function rights()
    {
        return view('pages.affiliate.atendimento.rights');
    }

    private function getFileType($file)
    {
        $mime = $file->getMimeType();
        if (str_contains($mime, 'image')) return 'photo';
        if (str_contains($mime, 'video')) return 'video';
        if (str_contains($mime, 'pdf')) return 'pdf';
        return 'other';
    }
}
