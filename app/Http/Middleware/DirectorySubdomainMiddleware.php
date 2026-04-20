<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Directory;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DirectorySubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $domain = config('app.url');
        $parsedDomain = parse_url($domain, PHP_URL_HOST);
        
        // Se estivermos no domínio raiz ou se for um painel fixo, ignorar
        $fixedSubdomains = ['administrativo', 'afiliado', 'juridico', 'tesouraria', 'candidato', 'dev', 'www'];
        
        $subdomain = explode('.', $host)[0];

        if ($host !== $parsedDomain && !in_array($subdomain, $fixedSubdomains)) {
            $directory = Directory::where('subdomain', $subdomain)
                ->orWhere('slug', $subdomain)
                ->first();

            if ($directory) {
                // Compartilha o diretório com todas as views
                View::share('currentDirectory', $directory);
                $request->merge(['currentDirectory' => $directory]);
            } else {
                // Se o subdomínio não existe no banco, redireciona para o principal ou dá 404
                // abort(404, 'Diretório não encontrado.');
            }
        }

        return $next($request);
    }
}
