<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.public.home');
    }

    public function manifesto()
    {
        return view('pages.public.manifesto');
    }

    public function proposals()
    {
        return view('pages.public.proposals');
    }
