<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateDashboardController extends Controller
{
    public function index()
    {
        $candidate = auth()->user();
        
        // Stats
        $totalSupporters = $candidate->referrals()->count();
        $totalProjections = \App\Models\VoteProjection::where('candidate_id', $candidate->id)->sum('expected_votes');
        $actualVotes = \App\Models\VoteProjection::where('candidate_id', $candidate->id)->sum('actual_votes');
        
        $teamCount = \App\Models\CampaignTeamMember::where('candidate_id', $candidate->id)->count();
        $eventsCount = \App\Models\Event::where('candidate_id', $candidate->id)
            ->whereBetween('start_time', [now()->subMonth(), now()])
            ->count();
            
        $campaignBalance = \App\Models\Donation::where('candidate_id', $candidate->id)
            ->where('status', 'confirmed')
            ->sum('amount');

        // Recent Supporters
        $recentSupporters = $candidate->referrals()->latest()->limit(5)->get();

        // Agenda
        $agenda = \App\Models\Event::where('candidate_id', $candidate->id)
            ->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->limit(3)
            ->get();

        return view('pages.candidate.dashboard', compact(
            'candidate',
            'totalSupporters', 
            'totalProjections', 
            'actualVotes',
            'teamCount', 
            'eventsCount',
            'campaignBalance',
            'recentSupporters',
            'agenda'
        ));
    }

    public function votes() 
    { 
        $candidate = auth()->user();
        $projections = \App\Models\VoteProjection::where('candidate_id', $candidate->id)->get();
        return view('pages.candidate.votes', compact('projections')); 
    }

    public function team() 
    { 
        $candidate = auth()->user();
        $team = \App\Models\CampaignTeamMember::with('user')->where('candidate_id', $candidate->id)->get();
        return view('pages.candidate.team', compact('team')); 
    }

    public function materials() 
    { 
        return view('pages.candidate.materials'); 
    }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        \App\Models\Event::create([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'location' => $request->location,
            'candidate_id' => auth()->id(),
        ]);

        return back()->with('success', 'Evento agendado com sucesso!');
    }

    public function storeTeamMember(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'role' => 'required|string',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        \App\Models\CampaignTeamMember::updateOrCreate([
            'candidate_id' => auth()->id(),
            'user_id' => $user->id,
        ], [
            'role' => $request->role,
            'is_active' => true,
        ]);

        return back()->with('success', 'Integrante adicionado à equipe!');
    }

    public function broadcastMessage(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        \App\Models\CommunicationBroadcast::create([
            'sender_id' => auth()->id(),
            'subject' => 'Mensagem do Candidato',
            'content' => $request->content,
            'target_segment' => 'team',
            'sent_at' => now(),
        ]);

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
