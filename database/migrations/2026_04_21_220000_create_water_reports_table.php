<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('water_reports', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('name');
            $blueprint->string('city');
            $blueprint->string('neighborhood');
            $blueprint->string('problem_type');
            $blueprint->text('description');
            $blueprint->date('event_date');
            $blueprint->string('photo')->nullable();
            $blueprint->string('contact');
            $blueprint->foreignId('affiliate_id')->nullable()->constrained('users')->onDelete('set null');
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_reports');
    }
};
