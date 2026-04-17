<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$p = 'avatars/wb2OT5dd5q_1776449034.png';
$f = storage_path('app/public/' . $p);
echo "Path: $f\n";
echo "Exists: " . (file_exists($f) ? "YES" : "NO") . "\n";
if (file_exists($f)) {
    echo "Size: " . filesize($f) . "\n";
}
