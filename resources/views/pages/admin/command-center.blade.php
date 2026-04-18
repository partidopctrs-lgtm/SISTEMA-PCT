@extends('components.dashboard-layout')

@section('title', 'Central de Comando - PCT')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Central de Comando</h1>
            <p class="text-slate-500 mt-1">Monitoramento em tempo real do crescimento nacional.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition shadow-lg shadow-blue-200 flex items-center gap-2">
                <i class="fas fa-sync-alt"></i> Atualizar Dados
            </button>
            <button class="px-4 py-2 bg-slate-100 text-slate-700 rounded-xl font-medium hover:bg-slate-200 transition">
                <i class="fas fa-download"></i> Relatório BI
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-6 rounded-3xl text-white shadow-xl shadow-blue-200">
            <div class="flex justify-between items-start">
                <p class="text-blue-100 font-medium">Total de Membros</p>
                <div class="p-2 bg-white/20 rounded-lg"><i class="fas fa-users"></i></div>
            </div>
            <h2 class="text-4xl font-bold mt-4" id="stat-total-members">12.450</h2>
            <p class="text-blue-200 text-sm mt-2"><i class="fas fa-arrow-up"></i> +15% este mês</p>
        </div>
        
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="flex justify-between items-start">
                <p class="text-slate-500 font-medium">Meta Nacional</p>
                <div class="p-2 bg-green-50 text-green-600 rounded-lg"><i class="fas fa-bullseye"></i></div>
            </div>
            <h2 class="text-4xl font-bold text-slate-900 mt-4">62%</h2>
            <div class="w-full bg-slate-100 h-2 rounded-full mt-4">
                <div class="bg-green-500 h-2 rounded-full" style="width: 62%"></div>
            </div>
            <p class="text-slate-400 text-xs mt-2">Próxima meta: 20.000 membros</p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="flex justify-between items-start">
                <p class="text-slate-500 font-medium">Campanhas Ativas</p>
                <div class="p-2 bg-amber-50 text-amber-600 rounded-lg"><i class="fas fa-paper-plane"></i></div>
            </div>
            <h2 class="text-4xl font-bold text-slate-900 mt-4">08</h2>
            <p class="text-slate-400 text-sm mt-2">3 programadas para amanhã</p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="flex justify-between items-start">
                <p class="text-slate-500 font-medium">Alertas Críticos</p>
                <div class="p-2 bg-red-50 text-red-600 rounded-lg"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
            <h2 class="text-4xl font-bold text-slate-900 mt-4">02</h2>
            <p class="text-red-500 text-sm mt-2 font-medium">Ação imediata necessária</p>
        </div>
    </div>

    <!-- BI Charts & Map -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Map Placeholder -->
        <div class="lg:col-span-2 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-6">Mapa de Calor Institucional</h3>
            <div class="aspect-video bg-slate-50 rounded-2xl flex items-center justify-center relative overflow-hidden">
                <div class="text-slate-300 text-center">
                    <i class="fas fa-map-marked-alt text-6xl mb-4 opacity-20"></i>
                    <p>Interface do Mapa Dinâmico</p>
                </div>
                <!-- Interactive Pins (Visual Mockup) -->
                <div class="absolute top-1/4 left-1/3 w-4 h-4 bg-red-500 rounded-full animate-ping"></div>
                <div class="absolute top-1/4 left-1/3 w-3 h-3 bg-red-600 rounded-full"></div>
                
                <div class="absolute bottom-1/3 right-1/4 w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                <div class="absolute bottom-1/3 right-1/4 w-3 h-3 bg-green-600 rounded-full"></div>
            </div>
            <div class="mt-6 flex gap-4 text-xs font-medium uppercase tracking-wider">
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-green-500"></span> Meta OK</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-amber-500"></span> Atenção</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-red-500"></span> Crítico</span>
            </div>
        </div>

        <!-- Growth Chart -->
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-6">Crescimento Semanal</h3>
            <canvas id="growthChart" height="250"></canvas>
            <div class="mt-8 space-y-4">
                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                    <span class="text-sm font-medium">Rio de Janeiro</span>
                    <span class="text-green-600 font-bold">+1.2k</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                    <span class="text-sm font-medium">São Paulo</span>
                    <span class="text-green-600 font-bold">+850</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                    <span class="text-sm font-medium">Minas Gerais</span>
                    <span class="text-amber-600 font-bold">+320</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('growthChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                datasets: [{
                    label: 'Novos Membros',
                    data: [150, 230, 180, 420, 390, 510, 480],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 0,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: { display: false }
                }
            }
        });
    });
</script>
@endpush
@endsection
