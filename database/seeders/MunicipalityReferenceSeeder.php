<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalityReferenceSeeder extends Seeder
{
    public function run(): void
    {
        // ... (Cidades já definidas no passo anterior)
        $metas = ["Aceguá", "Água Santa", "Agudo", "Ajuricaba", "Alecrim", "Alegrete", "Alpestre", "Alvorada", "Ametista do Sul", "Aratiba", "Arroio do Sal", "Arroio do Tigre", "Arroio dos Ratos", "Arroio Grande", "Arvorezinha", "Áurea", "Balneário Pinhal", "Barão de Cotegipe", "Barão do Triunfo", "Barra do Guarita", "Barra do Quaraí", "Barracão", "Barros Cassal", "Bento Gonçalves", "Boa Vista do Buricá", "Bom Jesus", "Bom Progresso", "Bom Retiro do Sul", "Boqueirão do Leão", "Bossoroca", "Braga", "Butiá", "Caçapava do Sul", "Cacequi", "Cachoeira do Sul", "Cachoeirinha", "Cacique Doble", "Caibaté", "Caiçara", "Cambará do Sul", "Campestre da Serra", "Campo Novo", "Candelária", "Cândido Godói", "Canguçu", "Canoas", "Capão do Leão", "Capivari do Sul", "Casca", "Caseiros", "Cerrito", "Cerro Largo", "Chapada", "Charqueadas", "Chuí", "Cidreira", "Ciríaco", "Condor", "Constantina", "Coronel Bicaco", "Crissiumal", "Cruz Alta", "Cruzeiro do Sul", "David Canabarro", "Dilermando de Aguiar", "Dois Irmãos", "Dom Pedrito", "Dona Francisca", "Doutor Maurício Cardoso", "Encantado", "Encruzilhada do Sul", "Entre Rios do Sul", "Entre-Ijuís", "Erebango", "Erval Grande", "Erval Seco", "Estação", "Esteio", "Estrela", "Faxinal do Soturno", "Faxinalzinho", "Feliz", "Formigueiro", "Frederico Westphalen", "Gaurama", "General Câmara", "Giruá", "Glorinha", "Gramado", "Gravataí", "Guarani das Missões", "Herval", "Horizontina", "Humaitá", "Ibiaçá", "Ibiraiaras", "Ilópolis", "Imbé", "Independência", "Inhacorá", "Ipê", "Iraí", "Itapuca", "Itaqui", "Itatiba do Sul", "Jaboticaba", "Jacutinga", "Jaguarão", "Jaguari", "Júlio de Castilhos", "Lagoa Bonita do Sul", "Lagoa Vermelha", "Lagoão", "Lavras do Sul", "Maçambará", "Machadinho", "Manoel Viana", "Marau", "Marcelino Ramos", "Mariano Moro", "Mata", "Maximiliano de Almeida", "Miraguaí", "Montenegro", "Morro Reuter", "Mostardas", "Muito Capões", "Nova Bréscia", "Nova Palma", "Nova Petrópolis", "Paim Filho", "Palmares do Sul", "Palmeira das Missões", "Palmitinho", "Panambi", "Pantano Grande", "Passa Sete", "Passo Fundo", "Paverama", "Pedro Osório", "Pejuçara", "Pinheirinho do Vale", "Pinheiro Machado", "Planalto", "Porto Lucena", "Porto Xavier", "Putinga", "Quaraí", "Redentora", "Restinga Sêca", "Rio Grande", "Rio Pardo", "Roca Sales", "Rodeio Bonito", "Ronda Alta", "Rondinha", "Rosário do Sul", "Salto do Jacuí", "Sananduva", "Santa Margarida do Sul", "Santa Maria", "Santa Rosa", "Santana da Boa Vista", "Santiago", "Santo Ângelo", "Santo Antônio da Patrulha", "Santo Antônio das Missões", "Santo Augusto", "Santo Expedito do Sul", "São Borja", "São Francisco de Paula", "São Jerônimo", "São João da Urtiga", "São José do Inhacorá", "São José do Norte", "São José do Ouro", "São José dos Ausentes", "São Lourenço do Sul", "São Luiz Gonzaga", "São Martinho", "São Miguel das Missões", "São Nicolau", "São Pedro da Serra", "São Pedro do Sul", "São Sebastião do Caí", "São Sepé", "São Valentim", "Sarandi", "Seberi", "Sede Nova", "Serafina Corrêa", "Sertão", "Sertão Santana", "Severiano de Almeida", "Silveira Martins", "Sobradinho", "Tapejara", "Taquari", "Taquaruçu do Sul", "Tavares", "Tenente Portela", "Terra de Areia", "Tiradentes do Sul", "Torres", "Três Cachoeiras", "Três de Maio", "Três Passos", "Trindade do Sul", "Triunfo", "Tucunduva", "Tupanciretã", "Tuparendi", "Unistalda", "Uruguaiana", "Vacaria", "Venâncio Aires", "Viadutos", "Viamão", "Vicente Dutra", "Vila Nova do Sul", "Vista Alegre", "Vista Gaúcha"];
        $prae = ["Aceguá", "Água Santa", "Agudo", "Ajuricaba", "Alecrim", "Alegrete", "Alpestre", "Alto Alegre", "Alvorada", "Ametista do Sul", "Aratiba", "Arroio do Meio", "Arroio do Sal", "Arroio do Tigre", "Arroio dos Ratos", "Arroio Grande", "Arvorezinha", "Áurea", "Balneário Pinhal", "Barão", "Barão de Cotegipe", "Barão do Triunfo", "Barra do Guarita", "Barra do Quaraí", "Barracão", "Barros Cassal", "Bento Gonçalves", "Boa Vista do Buricá", "Bom Jesus", "Bom Progresso", "Bom Retiro do Sul", "Boqueirão do Leão", "Bossoroca", "Braga", "Butiá", "Caçapava do Sul", "Cacequi", "Cachoeira do Sul", "Cachoeirinha", "Cacique Doble", "Caibaté", "Caiçara", "Cambará do Sul", "Campestre da Serra", "Campina das Missões", "Campo Novo", "Candelária", "Cândido Godói", "Canguçu", "Canoas", "Capão do Leão", "Capivari do Sul", "Carazinho", "Carlos Barbosa", "Casca", "Caseiros", "Catuípe", "Cerrito", "Cerro Largo", "Chapada", "Charqueadas", "Chuí", "Cidreira", "Ciríaco", "Condor", "Constantina", "Coronel Bicaco", "Crissiumal", "Cruz Alta", "Cruzeiro do Sul", "David Canabarro", "Derrubadas", "Dilermando de Aguiar", "Dois Irmãos", "Dom Pedrito", "Dona Francisca", "Doutor Maurício Cardoso", "Encantado", "Encruzilhada do Sul", "Entre Rios do Sul", "Entre-Ijuís", "Erebango", "Erval Grande", "Erval Seco", "Estação", "Esteio", "Estrela", "Farroupilha", "Faxinal do Soturno", "Faxinalzinho", "Feliz", "Formigueiro", "Frederico Westphalen", "Gaurama", "General Câmara", "Getúlio Vargas", "Giruá", "Glorinha", "Gramado", "Gravataí", "Guarani das Missões", "Herval", "Horizontina", "Humaitá", "Ibiaçá", "Ibiraiaras", "Ijuí", "Ilópolis", "Imbé", "Independência", "Inhacorá", "Ipê", "Iraí", "Itapuca", "Itaqui", "Itatiba do Sul", "Ivorá", "Jaboticaba", "Jacutinga", "Jaguarão", "Jaguari", "Júlio de Castilhos", "Lagoa Bonita do Sul", "Lagoa Vermelha", "Lagoão", "Lajeado", "Lavras do Sul", "Liberato Salzano", "Maçambará", "Machadinho", "Manoel Viana", "Marau", "Marcelino Ramos", "Mariano Moro", "Mata", "Maximiliano de Almeida", "Miraguaí", "Montenegro", "Morro Reuter", "Mostardas", "Muito Capões", "Nonoai", "Nova Bréscia", "Nova Esperança do Sul", "Nova Palma", "Nova Petrópolis", "Paim Filho", "Palmares do Sul", "Palmeira das Missões", "Palmitinho", "Panambi", "Pantano Grande", "Passa Sete", "Passo Fundo", "Paverama", "Pedras Altas", "Pedro Osório", "Pejuçara", "Pinheirinho do Vale", "Pinheiro Machado", "Piratini", "Planalto", "Porto Lucena", "Porto Xavier", "Putinga", "Quaraí", "Redentora", "Restinga Sêca", "Rio dos Índios", "Rio Grande", "Rio Pardo", "Roca Sales", "Rodeio Bonito", "Ronda Alta", "Rondinha", "Rosário do Sul", "Salto do Jacuí", "Salvador do Sul", "Sananduva", "Santa Margarida do Sul", "Santa Maria", "Santa Maria do Herval", "Santa Rosa", "Santa Vitória do Palmar", "Santana da Boa Vista", "Santiago", "Santo Ângelo", "Santo Antônio da Patrulha", "Santo Antônio das Missões", "Santo Augusto", "Santo Cristo", "Santo Expedito do Sul", "São Borja", "São Francisco De Paula", "São Jerônimo", "São João da Urtiga", "São José do Norte", "São José do Ouro", "São José dos Ausentes", "São Lourenço do Sul", "São Luiz Gonzaga", "São Martinho", "São Miguel das Missões", "São Nicolau", "São Pedro da Serra", "São Pedro do Sul", "São Sebastião do Caí", "São Sepé", "São Valentim", "Sarandi", "Seberi", "Sede Nova", "Selbach", "Serafina Corrêa", "Sertão", "Sertão Santana", "Severiano de Almeida", "Silveira Martins", "Sobradinho", "Tapejara", "Taquari", "Taquaruçu do Sul", "Tavares", "Tenente Portela", "Terra de Areia", "Tiradentes do Sul", "Torres", "Três Cachoeiras", "Três de Maio", "Três Passos", "Trindade do Sul", "Triunfo", "Tucunduva", "Tupanciretã", "Tuparendi", "Unistalda", "Vacaria", "Venâncio Aires", "Viadutos", "Viamão", "Vicente Dutra", "Vila Nova do Sul", "Vista Alegre", "Vista Gaúcha"];
        $pmsb_updated = ["São Francisco de Paula"];
        $pmsb_critical = ["Ajuricaba", "Alecrim", "Alegrete", "Alpestre", "Alto Alegre", "Alvorada", "Ametista do Sul", "Aratiba", "Arroio do Meio", "Arroio do Sal", "Arroio do Tigre", "Arroio dos Ratos", "Arvorezinha", "Áurea", "Balneário Pinhal", "Barão", "Barão do Triunfo", "Barra do Quaraí", "Barros Cassal", "Bento Gonçalves", "Boa Vista do Buricá", "Bom Jesus", "Bom Progresso", "Bom Retiro do Sul", "Bossoroca", "Butiá", "Cachoeirinha", "Caibaté", "Caiçara", "Cambará do Sul", "Campina das Missões", "Campo Novo", "Candelária", "Canguçu", "Canoas", "Capão do Leão", "Carazinho", "Carlos Barbosa", "Casca", "Caseiros", "Catuípe", "Cerrito", "Cerro Largo", "Chapada", "Charqueadas", "Chuí", "Cidreira", "Ciríaco", "Condor", "Constantina", "Cruzeiro do Sul", "David Canabarro", "Derrubadas", "Dois Irmãos", "Dom Pedrito", "Encruzilhada do Sul", "Entre Rios do Sul", "Erebango", "Erval Grande", "Erval Seco", "Estação", "Esteio", "Farroupilha", "Faxinal do Soturno", "Feliz", "Gaurama", "General Câmara", "Getúlio Vargas", "Giruá", "Glorinha", "Gramado", "Gravataí", "Guarani das Missões", "Herval", "Horizontina", "Humaitá", "Ibiraiaras", "Ijuí", "Ilópolis", "Imbé", "Independência", "Ipê", "Itapuca", "Itaqui", "Ivorá", "Jaguari", "Lagoa Bonita do Sul", "Lagoão", "Lajeado", "Liberato Salzano", "Marau", "Marcelino Ramos", "Mata", "Montenegro", "Morro Reuter", "Mostardas", "Nonoai", "Nova Esperança do Sul", "Nova Petrópolis", "Palmares do Sul", "Palmeira das Missões", "Panambi", "Pantano Grande", "Passa Sete", "Passo Fundo", "Pedras Altas", "Pedro Osório", "Pinheiro Machado", "Putinga", "Quaraí", "Redentora", "Restinga Sêca", "Rio dos Índios", "Rio Grande", "Rio Pardo", "Ronda Alta", "Salto do Jacuí", "Salvador do Sul", "Santa Maria", "Santa Maria do Herval", "Santa Rosa", "Santiago", "Santo Ângelo", "Santo Antônio da Patrulha", "Santo Antônio das Missões", "Santo Augusto", "Santo Cristo", "São Borja", "São Jerônimo", "São José dos Ausentes", "São Lourenço do Sul", "São Miguel das Missões", "São Nicolau", "São Pedro da Serra", "São Pedro do Sul", "São Sebastião do Caí", "São Sepé", "São Valentim", "Sarandi", "Selbach", "Serafina Corrêa", "Sertão", "Sobradinho", "Tavares", "Tenente Portela", "Terra de Areia", "Tiradentes do Sul", "Torres", "Três Cachoeiras", "Três de Maio", "Três Passos", "Trindade do Sul", "Triunfo", "Tupanciretã", "Tuparendi", "Vacaria", "Venâncio Aires", "Viamão", "Vicente Dutra"];

        $all_cities = array_unique(array_merge($metas, $prae, $pmsb_updated, $pmsb_critical));

        foreach ($all_cities as $city) {
            $status = 'none';
            if (in_array($city, $pmsb_updated)) $status = 'updated';
            if (in_array($city, $pmsb_critical)) $status = 'not_updated';

            DB::table('municipality_references')->insert([
                'name' => $city,
                'has_universalization_meta' => in_array($city, $metas),
                'adhered_to_prae' => in_array($city, $prae),
                'pmsb_status' => $status,
                'is_corsan_system' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Autos de Infração 2025
        $notices2025 = [
            ['notice_id' => 'AI 30/2025 - DSI', 'municipality' => 'Estrela'],
            ['notice_id' => 'AI 28/2025 - DSI', 'municipality' => 'Lajeado'],
            ['notice_id' => 'AI 22/2025 - DSI', 'municipality' => 'Cruz Alta'],
            ['notice_id' => 'AI 21/2025 - DSI', 'municipality' => 'Salto do Jacuí'],
            ['notice_id' => 'AI 20/2025 - DSI', 'municipality' => 'Tapejara'],
            ['notice_id' => 'AI 19/2025 - DSI', 'municipality' => 'Passo Fundo'],
            ['notice_id' => 'AI 18/2025 - DSI', 'municipality' => 'Santa Maria'],
            ['notice_id' => 'AI 17/2025 - DSI', 'municipality' => 'Campestre da Serra'],
            ['notice_id' => 'AI 16/2025 - DSI', 'municipality' => 'Bom Jesus'],
            ['notice_id' => 'AI 15/2025 - DSI', 'municipality' => 'Nonoai'],
            ['notice_id' => 'AI 13/2025 - DSI', 'municipality' => 'Alvorada'],
            ['notice_id' => 'AI 11/2025 - DSI', 'municipality' => 'Canoas'],
            ['notice_id' => 'AI 08/2025 - DSI', 'municipality' => 'Cachoeirinha'],
            ['notice_id' => 'AI 06/2025 - DSI', 'municipality' => 'Lagoa Vermelha'],
            ['notice_id' => 'AI 03/2025 - DSI', 'municipality' => 'Vacaria'],
            ['notice_id' => 'AI 02/2025 - DSI', 'municipality' => 'Marau'],
        ];

        foreach ($notices2025 as $n) {
            DB::table('infringement_notices')->insert([
                'notice_id' => $n['notice_id'],
                'year' => 2025,
                'entity' => 'CORSAN',
                'municipality_name' => $n['municipality'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Autos de Infração 2023
        $notices2023 = [
            ['notice_id' => 'AI 17/2023 - DQ', 'municipality' => 'Uruguaiana', 'entity' => 'BRK Ambiental'],
            ['notice_id' => 'AI 14/2023 - DQ', 'municipality' => 'Esteio', 'entity' => 'CORSAN'],
            ['notice_id' => 'AI 13/2023 - DQ', 'municipality' => 'Uruguaiana', 'entity' => 'BRK Ambiental'],
            ['notice_id' => 'AI 11/2023 - DQ', 'municipality' => 'Santa Maria do Herval', 'entity' => 'CORSAN'],
            ['notice_id' => 'AI 09/2023 - DQ', 'municipality' => 'Uruguaiana', 'entity' => 'BRK Ambiental'],
            ['notice_id' => 'AI 08/2023 - DQ', 'municipality' => 'Morro Reuter', 'entity' => 'CORSAN'],
        ];

        foreach ($notices2023 as $n) {
            DB::table('infringement_notices')->insert([
                'notice_id' => $n['notice_id'],
                'year' => 2023,
                'entity' => $n['entity'],
                'municipality_name' => $n['municipality'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
