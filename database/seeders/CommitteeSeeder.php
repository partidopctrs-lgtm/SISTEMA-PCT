<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $national = \App\Models\Committee::create([
            'name' => 'Diretório Nacional PCT',
            'level' => 'national',
            'location' => 'Brasília, DF',
        ]);

        $rs = \App\Models\Committee::create([
            'name' => 'Diretório Estadual RS',
            'level' => 'state',
            'location' => 'Porto Alegre, RS',
            'parent_id' => $national->id,
        ]);

        \App\Models\Committee::create([
            'name' => 'Comitê Municipal Porto Alegre',
            'level' => 'municipal',
            'location' => 'Porto Alegre, RS',
            'parent_id' => $rs->id,
        ]);
    }
}
