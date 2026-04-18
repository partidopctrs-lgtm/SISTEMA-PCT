<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateDashboardController extends Controller
{
    public function index()
    {
        return view('pages.candidate.dashboard');
    }

    public function votes() { return view('pages.candidate.votes'); }
    public function team() { return view('pages.candidate.team'); }
    public function materials() { return $this->index(); }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }
}
