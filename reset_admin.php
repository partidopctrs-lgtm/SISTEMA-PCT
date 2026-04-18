<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$adminEmail = 'admin@pct.social.br';
$adminPassword = 'pct2026';

$user = User::where('email', $adminEmail)->first();
if ($user) {
    $user->password = Hash::make($adminPassword);
    $user->save();
    echo "Admin password reset.\n";
} else {
    $user = User::create([
        'name' => 'Presidente',
        'email' => $adminEmail,
        'password' => Hash::make($adminPassword),
        'phone' => '0000000000',
        'cpf' => '00000000000',
        'role' => 'admin',
    ]);
    echo "Admin created.\n";
}
?>
