<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
try {
    // Test the specific query from the dashboard view
    echo 'distinct state count: ';
    echo App\Models\User::distinct('state')->count() . PHP_EOL;
    echo 'All view queries OK' . PHP_EOL;
} catch(Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
