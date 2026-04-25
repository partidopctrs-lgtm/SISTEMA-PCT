<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Directory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
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
        
        $isLocal = str_contains($host, 'localhost') || $host === '127.0.0.1';
        $baseSuffix = $isLocal ? 'localhost' : $parsedDomain;

        // Definir parâmetros padrão para geração de URLs (evita erro de parâmetro ausente)
        URL::defaults([
            'domain' => $host,
            'admin_domain' => 'administrativo.' . $baseSuffix,
            'affiliate_domain' => 'afiliado.' . $baseSuffix,
            'subdomain' => str_replace('.' . $parsedDomain, '', $host) ?: 'www'
        ]);
        
        // Se estivermos no domínio raiz ou se for um painel fixo, ignorar
        $fixedSubdomains = ['administrativo', 'afiliado', 'juridico', 'tesouraria', 'candidato', 'dev', 'www', 'comite', 'tesouraria'];
        
        // Extrair tudo que vem antes de pct.social.br
        $subdomain = str_replace('.' . $parsedDomain, '', $host);
        
        // Se o subdomínio for algo como 'diretorio.taquara', vamos tentar pegar a última parte ou procurar o todo
        $parts = explode('.', $subdomain);
        $cleanSubdomain = end($parts); // Pega 'taquara' de 'diretorio.taquara'

        if ($host !== $parsedDomain && !in_array($subdomain, $fixedSubdomains)) {
            $directory = Directory::where('subdomain', $cleanSubdomain)
                ->orWhere('slug', $cleanSubdomain)
                ->orWhere('subdomain', $subdomain) // Tenta o completo também por segurança
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
