<x-dashboard-layout>
    <x-slot name="title">Quiz do Manifesto - PCT</x-slot>

    <div class="max-w-3xl mx-auto py-12 px-4">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter mb-4">Avaliação do Manifesto</h1>
            <p class="text-gray-500 font-medium">Demonstre seu domínio sobre os pilares do movimento para ganhar seus pontos.</p>
        </div>

        <form action="{{ route('affiliate.quiz.manifesto.submit') }}" method="POST" class="space-y-8">
            @csrf
            
            @foreach($questions as $index => $q)
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Questão {{ $index + 1 }} de {{ count($questions) }}</p>
                <h3 class="text-lg font-black text-pct-blue mb-8 leading-tight">{{ $q['question'] }}</h3>
                
                <div class="space-y-4">
                    @foreach($q['options'] as $key => $option)
                    <label class="flex items-center gap-4 p-4 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-white hover:border-pct-blue hover:shadow-md transition-all group">
                        <input type="radio" name="q{{ $q['id'] }}" value="{{ $key }}" class="w-5 h-5 text-pct-blue border-slate-300 focus:ring-pct-blue">
                        <div class="flex items-center gap-3">
                            <span class="h-6 w-6 bg-white border border-slate-200 rounded-lg flex items-center justify-center text-[10px] font-black text-gray-400 group-hover:bg-pct-blue group-hover:text-white group-hover:border-pct-blue transition-all">{{ $key }}</span>
                            <span class="text-sm font-bold text-gray-700">{{ $option }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="pt-8">
                <button type="submit" class="w-full py-6 bg-pct-blue text-white font-black rounded-[1.5rem] text-sm uppercase tracking-[0.2em] shadow-lg shadow-blue-900/20 hover:bg-blue-900 hover:scale-[1.02] transition-all">
                    Finalizar Avaliação e Coletar Pontos
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
