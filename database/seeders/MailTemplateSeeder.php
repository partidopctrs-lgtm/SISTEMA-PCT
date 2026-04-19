<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MailTemplate;

class MailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        MailTemplate::updateOrCreate(
            ['slug' => 'boas-vindas'],
            [
                'name' => 'Boas-vindas ao PCT',
                'subject' => 'Seja bem-vindo ao Partido Cidadania e Trabalho!',
                'blade_view' => 'emails.nao-responder',
                'is_active' => true,
            ]
        );

        MailTemplate::updateOrCreate(
            ['slug' => 'diretorio-ativado'],
            [
                'name' => 'Diretório Ativado',
                'subject' => 'Seu diretório foi ativado com sucesso!',
                'blade_view' => 'emails.comprovante',
                'is_active' => true,
            ]
        );

        MailTemplate::updateOrCreate(
            ['slug' => 'filiacao-aprovada'],
            [
                'name' => 'Filiação Aprovada',
                'subject' => 'Sua filiação ao PCT foi aprovada!',
                'blade_view' => 'emails.filiacao-aprovada',
                'is_active' => true,
            ]
        );
    }
}
