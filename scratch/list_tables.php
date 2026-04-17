<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

$tables = DB::select("SELECT name FROM sqlite_master WHERE type='table'");
foreach($tables as $table) {
    echo $table->name . "\n";
}
