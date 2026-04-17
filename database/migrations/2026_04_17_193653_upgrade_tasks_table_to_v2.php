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
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('task_code')->unique()->after('id');
            $table->string('module')->default('admin'); // legal, financial, communication, committee, admin
            $table->string('priority')->default('medium'); // low, medium, high, urgent
            $table->timestamp('due_date')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['task_code', 'module', 'priority', 'due_date', 'created_by']);
        });
    }
};
