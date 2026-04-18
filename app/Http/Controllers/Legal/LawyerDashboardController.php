<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LawyerDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $myTasks = \App\Models\LegalRequest::where('assigned_to', $user->id)
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->orderBy('priority', 'desc')
            ->get();

        $myCompleted = \App\Models\LegalRequest::where('assigned_to', $user->id)
            ->where('status', 'completed')
            ->count();

        $myTotal = \App\Models\LegalRequest::where('assigned_to', $user->id)->count();

        $urgentCount = $myTasks->where('priority', 'urgent')->count();

        // Buscar denúncias pendentes (para que o advogado distribua tarefas)
        $complaints = \App\Models\LegalComplaint::where('status', 'pendente')
            ->latest()
            ->limit(5)
            ->get();

        return view('pages.advogado.dashboard', compact(
            'user', 'myTasks', 'myCompleted', 'myTotal', 'urgentCount', 'complaints'
        ));
    }

    public function tarefas(Request $request)
    {
        $user = auth()->user();

        $query = \App\Models\LegalRequest::where('assigned_to', $user->id);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->priority) {
            $query->where('priority', $request->priority);
        }

        $tarefas = $query->with('requester')->orderBy('created_at', 'desc')->paginate(15);

        return view('pages.advogado.tarefas', compact('tarefas'));
    }

    public function showTarefa($id)
    {
        $tarefa = \App\Models\LegalRequest::with(['requester', 'messages.user', 'directory'])
            ->findOrFail($id);

        return view('pages.advogado.tarefa-detail', compact('tarefa'));
    }

    public function responderTarefa(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
            'status'  => 'nullable|string',
        ]);

        $tarefa = \App\Models\LegalRequest::findOrFail($id);

        \App\Models\LegalRequestMessage::create([
            'legal_request_id' => $tarefa->id,
            'user_id'          => auth()->id(),
            'message'          => $request->message,
        ]);

        if ($request->status) {
            $tarefa->update(['status' => $request->status]);
        } elseif ($tarefa->status === 'new') {
            $tarefa->update(['status' => 'in_progress']);
        }

        return redirect()->back()->with('success', 'Resposta registrada com sucesso.');
    }

    public function denuncias()
    {
        $complaints = \App\Models\LegalComplaint::latest()->paginate(15);
        return view('pages.advogado.denuncias', compact('complaints'));
    }

    public function processos()
    {
        $processos = \App\Models\LegalDisciplinaryProcess::with('member')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('pages.advogado.processos', compact('processos'));
    }

    public function pareceres()
    {
        $user = auth()->user();
        $pareceres = \App\Models\LegalOpinion::where('lawyer_id', $user->id)
            ->latest()
            ->paginate(15);

        return view('pages.advogado.pareceres', compact('pareceres'));
    }

    public function storeParecer(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'type'    => 'required|string',
        ]);

        \App\Models\LegalOpinion::create([
            'lawyer_id'        => auth()->id(),
            'legal_request_id' => $request->legal_request_id,
            'title'            => $request->title,
            'content'          => $request->content,
            'type'             => $request->type,
            'status'           => 'rascunho',
        ]);

        return redirect()->route('advogado.pareceres')->with('success', 'Parecer registrado com sucesso.');
    }

    public function tribunal() { return $this->index(); }

    public function perfil()
    {
        $user = auth()->user();
        return view('pages.advogado.perfil', compact('user'));
    }
}
