<x-public-layout>
    <x-slot name="title">Nosso Manifesto - PCT</x-slot>

    <div class="bg-white py-12 md:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-pct-green bg-emerald-50 rounded-full uppercase">
                    O Futuro do Brasil
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-pct-blue mb-6">O Manifesto do Povo.</h1>
                <p class="text-xl text-gray-500 italic max-w-2x mx-auto leading-relaxed">
                    "Pela dignidade de quem constrói o país com suor e esperança. Por um Brasil de Cidadania Plena e Trabalho Decente."
                </p>
            </div>

            <div class="prose prose-lg max-w-none text-gray-600 space-y-8 leading-loose">
                <p>O Movimento <strong>Partido Cidadania e Trabalho (PCT)</strong> nasce de uma necessidade urgente: devolver ao trabalhador brasileiro o protagonismo da história. Vivemos em um país continental, rico em recursos, mas carente de justiça social efetiva e valorização real da força que move cada engrenagem desta nação.</p>

                <h2 class="text-2xl font-bold text-pct-blue border-l-4 border-pct-green pl-4 my-8">1. O Valor do Trabalho</h2>
                <p>Acreditamos que o trabalho não é apenas uma obrigação, mas o alicerce da dignidade humana. O PCT defende políticas que não apenas gerem empregos, mas garantam o acesso a carreiras promissoras, segurança jurídica para o empreendedor e proteção social para o trabalhador manual e intelectual.</p>

                <div class="py-8 my-8 border-y border-gray-100 flex items-center space-x-8">
                    <img src="{{ asset('logo.png') }}" alt="PCT Logo" class="h-24 w-auto grayscale opacity-20">
                    <p class="text-sm font-medium text-gray-400 italic">"Nenhum país se levanta sem o orgulho de sua força de trabalho."</p>
                </div>

                <h2 class="text-2xl font-bold text-pct-blue border-l-4 border-pct-green pl-4 my-8">2. A Cidadania Ativa</h2>
                <p>Cidadania não é apenas o ato de votar. É a participação constante, o acesso à saúde de qualidade, à educação transformadora e à segurança pública. O PCT propõe uma estrutura de comitês municipais e estaduais que ouçam a base antes de qualquer decisão no topo.</p>

                <h2 class="text-2xl font-bold text-pct-blue border-l-4 border-pct-green pl-4 my-8">3. Nossa Missão</h2>
                <p>Nossa missão é clara: unir o Brasil em torno de um projeto técnico, ético e popular. Sem extremismos, mas com a firmeza de quem sabe que o progresso só acontece quando a cidadania e o trabalho andam de mãos dadas.</p>
            </div>

            <div class="mt-20 p-10 bg-pct-blue rounded-[3rem] text-white text-center shadow-xl">
                <h3 class="text-2xl font-bold mb-4 italic">Assine seu apoio.</h3>
                <p class="text-blue-100 mb-8 max-w-md mx-auto">Sua voz é o motor deste movimento. Junte-se a nós nesta jornada por um Brasil melhor.</p>
                <a href="{{ route('register.index') }}" class="btn-secondary inline-block px-12 py-4">Filiar-se ao PCT</a>
            </div>
        </div>
    </div>
</x-public-layout>
