<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LegalDashboardController extends Controller
{
    // ------- DASHBOARD JURÍDICO INSTITUCIONAL -------
    public function index()
    {
        $stats = [
            'total'       => \App\Models\LegalRequest::count(),
            'new'         => \App\Models\LegalRequest::where('status', 'new')->count(),
            'in_progress' => \App\Models\LegalRequest::where('status', 'in_progress')->count(),
            'critical'    => \App\Models\LegalRequest::where('priority', 'urgent')->count(),
            'complaints'  => \App\Models\LegalComplaint::count(),
            'processos'   => \App\Models\LegalDisciplinaryProcess::where('status', '!=', 'concluido')->count(),
            'advogados'   => \App\Models\User::where('role', 'legal')->count(),
        ];

        $latestRequests = \App\Models\LegalRequest::with('requester')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $urgentComplaints = \App\Models\LegalComplaint::where('status', 'pendente')
            ->latest()
            ->limit(5)
            ->get();

        return view('pages.legal.dashboard', compact('stats', 'latestRequests', 'urgentComplaints'));
    }

    // ------- CENTRAL DE SOLICITAÇÕES -------
    public function requests(Request $request)
    {
        $query = \App\Models\LegalRequest::with(['requester', 'directory']);

        if ($request->level)    $query->where('level', $request->level);
        if ($request->status)   $query->where('status', $request->status);
        if ($request->type)     $query->where('request_type', $request->type);
        if ($request->priority) $query->where('priority', $request->priority);

        $requests = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.legal.requests', compact('requests'));
    }

    public function showRequest($id)
    {
        $legalRequest = \App\Models\LegalRequest::with(['requester', 'directory', 'messages.user', 'assignedTo'])->findOrFail($id);
        $lawyers = \App\Models\User::where('role', 'legal')->get();
        return view('pages.legal.show-request', compact('legalRequest', 'lawyers'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $legalRequest = \App\Models\LegalRequest::findOrFail($id);

        \App\Models\LegalRequestMessage::create([
            'legal_request_id' => $legalRequest->id,
            'user_id'          => auth()->id(),
            'message'          => $request->message,
        ]);

        if ($legalRequest->status === 'new') {
            $legalRequest->update(['status' => 'in_progress']);
        }

        if ($request->assigned_to) {
            $legalRequest->update(['assigned_to' => $request->assigned_to]);
        }

        return redirect()->back()->with('success', 'Resposta enviada.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);
        $legalRequest = \App\Models\LegalRequest::findOrFail($id);
        $legalRequest->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status atualizado.');
    }

    // ------- DENÚNCIAS -------
    public function denuncias(Request $request)
    {
        $query = \App\Models\LegalComplaint::latest();

        if ($request->status) $query->where('status', $request->status);

        $complaints = $query->paginate(15);
        $stats = [
            'total'     => \App\Models\LegalComplaint::count(),
            'pendente'  => \App\Models\LegalComplaint::where('status', 'pendente')->count(),
            'em_analise'=> \App\Models\LegalComplaint::where('status', 'em_analise')->count(),
        ];

        return view('pages.legal.denuncias', compact('complaints', 'stats'));
    }

    // ------- PROCESSOS DISCIPLINARES -------
    public function processos(Request $request)
    {
        $query = \App\Models\LegalDisciplinaryProcess::latest();

        if ($request->status) $query->where('status', $request->status);

        $processos = $query->paginate(15);
        $stats = [
            'total'    => \App\Models\LegalDisciplinaryProcess::count(),
            'ativos'   => \App\Models\LegalDisciplinaryProcess::where('status', '!=', 'concluido')->count(),
        ];

        return view('pages.legal.processos', compact('processos', 'stats'));
    }

    // ------- PARECERES -------
    public function pareceresList(Request $request)
    {
        $pareceres = \App\Models\LegalOpinion::with(['lawyer', 'legalRequest'])
            ->latest()
            ->paginate(15);

        return view('pages.legal.pareceres', compact('pareceres'));
    }

    // ------- GESTÃO DE ADVOGADOS -------
    public function advogados()
    {
        $advogados = \App\Models\User::where('role', 'legal')->get();
        return view('pages.legal.advogados', compact('advogados'));
    }

    public function registrarAdvogado(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'oab'   => 'required|string|max:30',
            'state' => 'required|string|max:2',
        ]);

        $password = Str::random(10);

        $user = \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($password),
            'role'     => 'legal',
            'cpf'      => $request->cpf ?? null,
            'phone'    => $request->phone ?? null,
            'state'    => strtoupper($request->state),
        ]);

        return redirect()->route('legal.advogados')
            ->with('success', "Advogado {$user->name} cadastrado! Senha provisória: {$password}");
    }

    // ------- CONTRATOS -------
    public function contratos()
    {
        return view('pages.legal.contratos');
    }

    // ------- ALERTAS -------
    public function alertas()
    {
        $urgentRequests = \App\Models\LegalRequest::where('priority', 'urgent')
            ->whereNotIn('status', ['completed'])->get();
        $pendingComplaints = \App\Models\LegalComplaint::where('status', 'pendente')->get();

        return view('pages.legal.alertas', compact('urgentRequests', 'pendingComplaints'));
    }
}
