<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

use App\Models\User;

$u = User::where('email', 'viniamaral2026@gmail.com')->first();
if ($u) {
    $u->registration_number = 'PCT-0001';
    $u->save();
    echo "ID de Marcos atualizado para PCT-0001\n";
} else {
    echo "Usuário Marcos não encontrado.\n";
}
