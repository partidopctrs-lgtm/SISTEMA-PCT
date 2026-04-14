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
            // Se o usuário não estiver logado e tentar acessar uma rota protegida,
            // redireciona para a página de login do departamento correspondente.
            $loginPath = "/{$role}/login";
            return redirect($loginPath)->with('error', 'Acesse seu portal específico.');
        }

        return $next($request);
    }
}
