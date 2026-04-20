<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('directories', function (Blueprint $table) {
            if (!Schema::hasColumn('directories', 'slug')) {
                $table->string('slug')->unique()->nullable()->after('name');
            }
            if (!Schema::hasColumn('directories', 'subdomain')) {
                $table->string('subdomain')->unique()->nullable()->after('slug');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('directories', function (Blueprint $table) {
            $table->dropColumn(['slug', 'subdomain']);
        });
    }
};
