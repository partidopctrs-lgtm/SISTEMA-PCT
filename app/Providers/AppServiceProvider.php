<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\LegalRequest::observe(\App\Observers\LegalRequestObserver::class);

        // Define padrões para parâmetros de rota em domínios dinâmicos
        // Isso evita o erro "Missing required parameter for [Route: login]"
        \Illuminate\Support\Facades\URL::defaults([
            'domain' => 'pct.social.br',
            'affiliate_domain' => 'afiliado.pct.social.br',
            'subdomain' => 'taquara' // Padrão para comitês locais
        ]);
    }
}
