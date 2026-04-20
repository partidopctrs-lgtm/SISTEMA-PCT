<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Directory;
use Illuminate\Support\Str;

class DirectorySubdomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Atualiza o diretório de Taquara
        $taquara = Directory::where('city', 'like', '%Taquara%')->first();
        if ($taquara) {
            $taquara->update([
                'slug' => 'taquara',
                'subdomain' => 'taquara'
            ]);
        }

        // Garante que outros diretórios tenham slugs se necessário
        Directory::whereNull('slug')->each(function ($dir) {
            $dir->update([
                'slug' => Str::slug($dir->city . '-' . $dir->id)
            ]);
        });
    }
}
