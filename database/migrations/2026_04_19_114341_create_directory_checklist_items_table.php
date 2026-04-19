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
        Schema::create('directory_checklist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_id')->constrained('directories')->onDelete('cascade');
            $table->string('item_code'); // RG_CPF, ATA, etc
            $table->string('item_name');
            $table->boolean('is_required')->default(true);
            $table->string('status')->default('pending'); // pending, approved, rejected, na
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('verified_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directory_checklist_items');
    }
};
