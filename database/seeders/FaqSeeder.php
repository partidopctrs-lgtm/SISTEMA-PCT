<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Quem criou o PCT?',
                'answer' => 'O PCT foi criado em Taquara/RS por membros da própria comunidade, com o objetivo de organizar cidadãos e desenvolver lideranças locais e nacionais.',
                'order' => 1
            ],
            [
                'question' => 'O PCT é um partido político?',
                'answer' => 'Não. O PCT é uma associação civil e movimento cívico independente, não sendo um partido político.',
                'order' => 2
            ],
            [
                'question' => 'O PCT tem ligação com partidos?',
                'answer' => 'Não. O movimento é independente e não possui vínculo com partidos políticos (nem nacionais nem estrangeiros).',
                'order' => 3
            ],
            [
                'question' => 'Existe projeto de partido?',
                'answer' => "Pode existir no futuro, mas isso é separado do movimento e totalmente opcional.\nParticipar do PCT não obriga ninguém a apoiar partido.",
                'order' => 4
            ],
            [
                'question' => 'Participar obriga apoiar partido?',
                'answer' => 'Não. A participação no movimento não obriga apoio a qualquer partido. Você permanece totalmente livre.',
                'order' => 5
            ],
            [
                'question' => 'Por que existe contador de apoios?',
                'answer' => 'O contador representa pessoas interessadas no movimento e, opcionalmente, no apoio à futura formalização partidária.',
                'order' => 6
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
