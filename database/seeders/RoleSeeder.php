<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'Administrador', 'slug' => 'admin'],
            ['name' => 'Afiliado', 'slug' => 'affiliate'],
            ['name' => 'Candidato', 'slug' => 'candidate'],
            ['name' => 'Comitê', 'slug' => 'committee'],
            ['name' => 'Tesouraria', 'slug' => 'finance'],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
