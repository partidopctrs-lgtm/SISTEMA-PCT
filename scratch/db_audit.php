<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
foreach ($tables as $t) {
    echo "Table: {$t->name}\n";
    $columns = Schema::getColumnListing($t->name);
    foreach ($columns as $c) {
        echo "  - $c\n";
    }
    echo "\n";
}
