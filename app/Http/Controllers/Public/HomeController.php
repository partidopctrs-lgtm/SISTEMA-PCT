<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_signatures' => \App\Models\PartySignature::count(),
            'goal' => 500000,
            'by_state' => \App\Models\PartySignature::select('state', \DB::raw('count(*) as total'))
                ->groupBy('state')
                ->orderBy('total', 'desc')
                ->get(),
            'by_city' => \App\Models\PartySignature::select('city', 'state', \DB::raw('count(*) as total'))
                ->groupBy('city', 'state')
                ->orderBy('total', 'desc')
                ->limit(10)
                ->get()
        ];
        
        $stats['progress'] = ($stats['total_signatures'] / $stats['goal']) * 100;

        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get();
        
        return view('pages.public.home', compact('stats', 'faqs'));
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
