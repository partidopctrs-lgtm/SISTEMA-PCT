<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Schema::table('users', function(Blueprint $table) {
    if (!Schema::hasColumn('users', 'registration_document')) {
        $table->string('registration_document')->nullable();
    }
});
echo "OK\n";
