<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::where('role', 'admin')->first();
        $committee = \App\Models\Committee::first();

        if ($admin && $committee) {
            \App\Models\Transaction::create([
                'amount' => 5000.00,
                'type' => 'income',
                'category' => 'Doação Nacional',
                'user_id' => $admin->id,
                'committee_id' => $committee->id,
                'description' => 'Aporte inicial para expansão territorial.',
            ]);

            \App\Models\Transaction::create([
                'amount' => 1200.00,
                'type' => 'expense',
                'category' => 'Aluguel',
                'user_id' => $admin->id,
                'committee_id' => $committee->id,
                'description' => 'Pagamento mensal sede nacional.',
            ]);
        }
    }
}
