<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || ($request->user()->role !== $role && $request->user()->role !== 'admin')) {
            return redirect('/login')->with('error', 'Acesso negado: seu perfil não tem permissão para esta área.');
        }

        return $next($request);
    }
}
