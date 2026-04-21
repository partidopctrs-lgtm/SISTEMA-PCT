<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('water_reports', function (Blueprint $table) {
            $table->string('protocol')->unique()->after('id')->nullable();
            $table->string('status')->default('recebido')->after('protocol');
            $table->string('gravity')->default('baixa')->after('status'); // baixa, média, alta, crítica
            $table->decimal('latitude', 10, 8)->nullable()->after('contact');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            $table->boolean('is_urgent')->default(false)->after('longitude');
            $table->boolean('is_collective')->default(false)->after('is_urgent');
            $table->boolean('is_recurrent')->default(false)->after('is_collective');
        });

        Schema::create('report_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('water_report_id')->constrained('water_reports')->onDelete('cascade');
            $table->string('file_path');
            $table->string('file_type'); // photo, video, pdf
            $table->integer('file_size')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_evidences');
        Schema::table('water_reports', function (Blueprint $table) {
            $table->dropColumn(['protocol', 'status', 'gravity', 'latitude', 'longitude', 'is_urgent', 'is_collective', 'is_recurrent']);
        });
    }
};
