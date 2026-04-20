<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('events', 'candidate_id')) {
            Schema::table('events', function (Blueprint $table) {
                $table->foreignId('candidate_id')->nullable()->constrained('users')->onDelete('cascade');
            });
        }
 
        if (!Schema::hasColumn('donations', 'candidate_id')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->foreignId('candidate_id')->nullable()->constrained('users')->onDelete('cascade');
            });
        }
    }
 
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropColumn('candidate_id');
        });
 
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropColumn('candidate_id');
        });
    }
};
