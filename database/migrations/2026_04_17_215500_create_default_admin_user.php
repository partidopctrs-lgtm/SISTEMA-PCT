<?php
/**
 * Migration: create default admin user
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        // verifica se já existe
        $exists = DB::table('users')->where('email', 'admin@pct.org.br')->exists();
        if (! $exists) {
            DB::table('users')->insert([
                'name'               => 'Presidente Fundador',
                'email'              => 'admin@pct.org.br',
                'password'           => Hash::make('PCT@Forte2026!'), // Senha do Admin conforme solicitado
                'cpf'                => '00000000000',
                'phone'              => '0000000000',
                'role'               => 'admin',
                'registration_number'=> 'ADMIN-001',
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }

    public function down(): void {
        DB::table('users')->where('email', 'admin@pct.org.br')->delete();
    }
};
?>
