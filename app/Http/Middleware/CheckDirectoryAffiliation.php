<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDirectoryAffiliation
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$allowedStatuses): Response
    {
        $user = auth()->user();
        if (!$user) return redirect('/login');

        // Admin ignora restrições
        if ($user->role === 'admin') return $next($request);

        $directory = $user->committee;
        
        // Se não tem diretório vinculado
        if (!$directory) {
             return $next($request);
        }

        if (!in_array($directory->affiliation_status, $allowedStatuses)) {
            return redirect()->route('committee.dashboard')->with('warning', 'Recurso bloqueado para vínculo: ' . $directory->affiliation_status);
        }

        return $next($request);
    }
}
