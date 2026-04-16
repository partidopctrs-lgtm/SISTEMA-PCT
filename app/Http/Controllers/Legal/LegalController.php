<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        return view('pages.legal.dashboard');
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
