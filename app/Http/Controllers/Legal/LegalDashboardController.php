<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => \App\Models\LegalRequest::count(),
            'new' => \App\Models\LegalRequest::where('status', 'new')->count(),
            'in_progress' => \App\Models\LegalRequest::where('status', 'in_progress')->count(),
            'critical' => \App\Models\LegalRequest::where('priority', 'urgent')->count(),
        ];

        $latestRequests = \App\Models\LegalRequest::with('requester')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('pages.legal.dashboard', compact('stats', 'latestRequests'));
    }

    public function requests(Request $request)
    {
        $query = \App\Models\LegalRequest::with(['requester', 'directory']);

        if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $requests = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.legal.requests', compact('requests'));
    }

    public function showRequest($id)
    {
        $legalRequest = \App\Models\LegalRequest::with(['requester', 'directory', 'messages.user', 'assignedTo'])->findOrFail($id);
        return view('pages.legal.show-request', compact('legalRequest'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $legalRequest = \App\Models\LegalRequest::findOrFail($id);

        \App\Models\LegalRequestMessage::create([
            'legal_request_id' => $legalRequest->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        if ($legalRequest->status == 'new') {
            $legalRequest->update(['status' => 'in_progress']);
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
}
