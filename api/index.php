<?php

/**
 * Vercel PHP Runtime Entrypoint
 * Este arquivo é o ponto de entrada para as serverless functions da Vercel.
 * Ele carrega o bootstrap do Laravel e despacha a requisição.
 */

// Define o diretório público do Laravel
define('LARAVEL_START', microtime(true));

// Corrige o working directory para a raiz do projeto
chdir(dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);
