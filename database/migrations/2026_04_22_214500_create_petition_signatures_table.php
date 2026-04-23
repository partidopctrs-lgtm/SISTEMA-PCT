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
        Schema::create('petition_signatures', function (Blueprint $row) {
            $row->id();
            $row->string('name');
            $row->string('email')->unique();
            $row->string('cpf')->nullable()->unique();
            $row->string('city');
            $row->string('state');
            $row->string('whatsapp')->nullable();
            $row->timestamp('signed_at')->useCurrent();
            $row->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petition_signatures');
    }
};
