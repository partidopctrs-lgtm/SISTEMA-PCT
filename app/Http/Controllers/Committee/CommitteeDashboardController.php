<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommitteeDashboardController extends Controller
{
    public function index()
    {
        return view('pages.committee.dashboard');
    }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }
}
