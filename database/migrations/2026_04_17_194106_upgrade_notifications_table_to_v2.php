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
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('type')->default('operational')->after('message'); // operational, institutional, hierarchical
            $table->string('related_module')->nullable()->after('type'); // legal, financial, etc
            $table->unsignedBigInteger('related_id')->nullable()->after('related_module');
            $table->boolean('is_read')->default(false)->after('related_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['type', 'related_module', 'related_id', 'is_read']);
        });
    }
};
