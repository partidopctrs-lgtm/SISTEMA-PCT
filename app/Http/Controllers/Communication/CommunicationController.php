<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        return view('pages.communication.dashboard');
    }

    public function broadcast() { return $this->index(); }
    public function social() { return $this->index(); }
    public function press() { return $this->index(); }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }
}
