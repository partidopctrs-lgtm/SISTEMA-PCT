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
            // Renomear status para operational_status se existir
            if (Schema::hasColumn('directories', 'status')) {
                $table->renameColumn('status', 'operational_status');
            }

            $table->uuid('uuid')->unique()->after('id')->nullable();
            $table->string('region_district')->nullable()->after('state');
            $table->string('electoral_zone_reference')->nullable()->after('region_district');
            $table->date('founding_date')->nullable()->after('electoral_zone_reference');
            
            $table->date('cnpj_registration_date')->nullable()->after('cnpj');
            $table->string('registry_number')->nullable()->after('cnpj_registration_date');
            $table->string('legal_nature')->nullable()->after('social_name');
            $table->string('statute_number')->nullable()->after('legal_nature');
            $table->date('statute_approval_date')->nullable()->after('statute_number');
            $table->string('minutes_number')->nullable()->after('statute_approval_date');
            $table->string('registry_office')->nullable()->after('minutes_number');
            $table->string('book_number')->nullable()->after('registry_office');
            $table->string('sheet_number')->nullable()->after('book_number');
            
            $table->string('address_number')->nullable()->after('address_base');
            $table->string('address_complement')->nullable()->after('address_number');
            $table->string('reference_point')->nullable()->after('zip_code');
            $table->string('headquarters_type')->nullable()->after('reference_point');
            
            $table->string('whatsapp_contact')->nullable()->after('phone_contact');
            $table->string('email_official')->nullable()->after('whatsapp_contact');
            $table->string('instagram')->nullable()->after('email_official');
            $table->string('facebook')->nullable()->after('instagram');
            $table->string('website_url')->nullable()->after('facebook');
            
            $table->foreignId('vice_president_id')->nullable()->after('president_id')->constrained('users')->onDelete('set null');
            $table->foreignId('communication_director_id')->nullable()->after('treasurer_id')->constrained('users')->onDelete('set null');
            
            $table->integer('members_count')->default(0)->after('communication_director_id');
            $table->integer('municipalities_served_count')->nullable()->after('members_count');
            $table->integer('local_nuclei_count')->nullable()->after('municipalities_served_count');
            $table->text('coverage_notes')->nullable()->after('local_nuclei_count');
            
            $table->timestamp('submitted_at')->nullable()->after('coverage_notes');
            $table->timestamp('approved_at')->nullable()->after('submitted_at');
            $table->timestamp('activated_at')->nullable()->after('approved_at');
            $table->timestamp('blocked_at')->nullable()->after('activated_at');
            $table->timestamp('rejected_at')->nullable()->after('blocked_at');
            
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
