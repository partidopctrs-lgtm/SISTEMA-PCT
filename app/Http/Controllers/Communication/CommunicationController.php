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

    public function broadcast() 
    { 
        $broadcasts = \App\Models\CommunicationBroadcast::with('sender')->latest()->paginate(15);
        return view('pages.communication.broadcast', compact('broadcasts')); 
    }

    public function social() 
    { 
        return view('pages.communication.social'); 
    }

    public function press() 
    { 
        return view('pages.communication.press'); 
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
