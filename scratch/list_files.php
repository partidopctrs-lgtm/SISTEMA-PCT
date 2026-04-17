<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$dir = storage_path('app/public/avatars');
echo "Scanning Dir: $dir\n";
if (is_dir($dir)) {
    print_r(scandir($dir));
} else {
    echo "NOT A DIRECTORY\n";
}
