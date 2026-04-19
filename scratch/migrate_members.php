<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Directory;
use App\Models\User;
use App\Models\Membership;

$emails = ['viniamaral2026@gmail.com', 'marciamachado335@gmal.com'];
$taquara = Directory::where('city', 'like', '%Taquara%')->first();

if (!$taquara) {
    echo "Diretório de Taquara não encontrado.\n";
    exit;
}

echo "Diretório Taquara ID: " . $taquara->id . "\n";

foreach ($emails as $email) {
    $user = User::where('email', $email)->first();
    if ($user) {
        $user->update(['committee_id' => $taquara->id]);
        
        // Criar ou atualizar membership
        Membership::updateOrCreate(
            ['user_id' => $user->id, 'directory_id' => $taquara->id],
            ['membership_status' => 'active', 'joined_at' => now(), 'role' => 'membro']
        );
        echo "Usuário $email migrado com sucesso.\n";
    } else {
        echo "Usuário $email não encontrado.\n";
    }
}
