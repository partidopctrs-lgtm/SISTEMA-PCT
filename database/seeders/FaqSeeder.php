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
                'question' => 'O PCT é de esquerda ou direita?',
                'answer' => 'O PCT não nasce como um movimento de esquerda ou direita. Nosso foco é ouvir o povo, organizar as demandas e buscar soluções reais para a cidade. Mais importante do que rótulo político é fazer as coisas funcionarem.',
                'order' => 1
            ],
            [
                'question' => 'Quem está organizando o PCT?',
                'answer' => 'O movimento está sendo construído por pessoas da própria cidade — trabalhadores, empreendedores e cidadãos que vivem os problemas no dia a dia e decidiram se organizar para buscar soluções reais.',
                'order' => 2
            ],
            [
                'question' => 'Qual é o objetivo do PCT?',
                'answer' => 'Unir a população, defender direitos e transformar a realidade das cidades através de organização, participação e ação prática.',
                'order' => 3
            ],
            [
                'question' => 'O que o PCT faz na prática?',
                'answer' => "• Ouve a população\n• Registra problemas da cidade\n• Organiza demandas\n• Conecta pessoas\n• Busca soluções reais",
                'order' => 4
            ],
            [
                'question' => 'O PCT é um partido político?',
                'answer' => 'Ainda não. O PCT nasce como um movimento organizado da população, com o objetivo de estruturar uma base forte e, futuramente, avançar para uma estrutura política formal.',
                'order' => 5
            ],
            [
                'question' => 'Como posso participar?',
                'answer' => 'Você pode participar se cadastrando no site, acompanhando as ações, divulgando o movimento e ajudando a organizar sua cidade.',
                'order' => 6
            ],
            [
                'question' => 'Preciso pagar algo para participar?',
                'answer' => 'Não. A participação é livre e aberta. Qualquer apoio é voluntário.',
                'order' => 7
            ],
            [
                'question' => 'O que diferencia o PCT de outros movimentos?',
                'answer' => 'O foco em organização real, uso de tecnologia, escuta da população e construção prática de soluções — não apenas discurso.',
                'order' => 8
            ],
            [
                'question' => 'Problemas para acessar o site ou fazer login?',
                'answer' => "Se você encontrou erro ao fazer login em www.pct.social.br, não desista!\n\nEntre em contato conosco e faça parte do movimento: 👉 Sua participação é essencial para a mudança!",
                'order' => 9
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
