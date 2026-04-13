<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('pages.public.registration');
    }

    public function store(Request $request)
    {
        // Validation and creation logic here
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Aguarde a aprovação.');
    }
}
