<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_clicks', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('affiliate_id')->nullable()->constrained('users')->onDelete('cascade');
            $blueprint->string('campaign_name');
            $blueprint->string('ip_address')->nullable();
            $blueprint->text('user_agent')->nullable();
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_clicks');
    }
};
