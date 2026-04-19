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
        Schema::table('directory_members', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id');
            $table->string('cpf')->nullable()->after('name');
            $table->string('rg')->nullable()->after('cpf');
            $table->string('voter_title')->nullable()->after('rg');
            $table->string('phone')->nullable()->after('voter_title');
            $table->string('email')->nullable()->after('phone');
            $table->text('address')->nullable()->after('email');
            $table->string('photo_path')->nullable()->after('address');
            $table->string('document_path')->nullable()->after('photo_path');
            $table->string('verification_status')->default('pending')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('directory_members', function (Blueprint $table) {
            //
        });
    }
};
