<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Directory;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display the directory home page.
     */
    public function show(Request $request, $subdomain)
    {
        $directory = $request->get('currentDirectory');

        if (!$directory) {
            // Fallback lookup if middleware didn't catch it or for extra safety
            $directory = Directory::where('subdomain', $subdomain)
                ->orWhere('slug', $subdomain)
                ->withCount('memberships')
                ->firstOrFail();
        } else {
            // Se já veio do middleware, garante que o count esteja lá
            $directory->loadCount('memberships');
        }

        return view('pages.public.directory.show', compact('directory'));
    }
}
