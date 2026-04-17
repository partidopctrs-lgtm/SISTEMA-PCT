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
        Schema::table('users', function (Blueprint $table) {
            $table->string('rg')->nullable();
            $table->string('nationality')->default('Brasileira');
            $table->string('marital_status')->nullable();
            $table->string('voter_id')->nullable();
            $table->string('voter_zone')->nullable();
            $table->string('voter_section')->nullable();
            $table->string('education')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'rg', 'nationality', 'marital_status', 
                'voter_id', 'voter_zone', 'voter_section', 'education'
            ]);
        });
    }
};
