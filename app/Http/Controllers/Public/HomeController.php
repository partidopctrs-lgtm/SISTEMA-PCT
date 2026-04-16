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

    public function estatuto()
    {
        return view('pages.public.estatuto');
    }

    public function booklet()
    {
        return view('pages.public.booklet');
    }

    public function proposals()
    {
        return view('pages.public.proposals');
    }

    public function ethics()
    {
        return view('pages.public.ethics');
    }

    public function modelosOficios()
    {
        return view('pages.public.modelos-oficios');
    }
}
