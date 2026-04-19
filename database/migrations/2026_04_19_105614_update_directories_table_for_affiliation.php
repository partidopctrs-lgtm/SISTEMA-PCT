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
        Schema::table('directories', function (Blueprint $table) {
            $table->string('protocol_number')->unique()->after('id')->nullable();
            $table->string('legal_status')->default('sem formalização')->after('status');
            $table->string('affiliation_status')->default('solicitante')->after('legal_status');
            $table->string('cnpj')->nullable()->after('affiliation_status');
            $table->string('social_name')->nullable()->after('cnpj');
            $table->string('legal_responsible')->nullable()->after('social_name');
            $table->string('address_base')->nullable()->after('legal_responsible');
            $table->string('neighborhood')->nullable()->after('address_base');
            $table->string('zip_code')->nullable()->after('neighborhood');
            $table->string('phone_contact')->nullable()->after('zip_code');
            $table->foreignId('president_id')->nullable()->after('phone_contact')->constrained('users')->onDelete('set null');
            $table->foreignId('secretary_id')->nullable()->after('president_id')->constrained('users')->onDelete('set null');
            $table->foreignId('treasurer_id')->nullable()->after('secretary_id')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('directories', function (Blueprint $table) {
            $table->dropColumn([
                'protocol_number', 'legal_status', 'affiliation_status', 
                'cnpj', 'social_name', 'legal_responsible', 
                'address_base', 'neighborhood', 'zip_code', 'phone_contact',
                'president_id', 'secretary_id', 'treasurer_id'
            ]);
        });
    }
};
