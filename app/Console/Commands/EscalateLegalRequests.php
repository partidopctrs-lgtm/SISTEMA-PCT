<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EscalateLegalRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:escalate-legal-requests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        // 1. Local -> Estadual (após 48h sem resposta)
        $localRequests = \App\Models\LegalRequest::where('level', 'local')
            ->whereIn('status', ['new', 'assigned'])
            ->where('created_at', '<=', now()->subHours(48))
            ->get();

        foreach ($localRequests as $request) {
            $request->update(['level' => 'state']);
            $this->info("Escalado: {$request->request_code} para nível Estadual.");
            
            // Log e Notificação
            $this->logEscalation($request, 'Estadual');
        }

        // 2. Estadual -> Nacional (após 72h no estado sem conclusão)
        $stateRequests = \App\Models\LegalRequest::where('level', 'state')
            ->whereIn('status', ['new', 'assigned', 'in_progress'])
            ->where('updated_at', '<=', now()->subHours(72))
            ->get();

        foreach ($stateRequests as $request) {
            $request->update(['level' => 'national']);
            $this->info("Escalado: {$request->request_code} para nível Nacional.");
            
            $this->logEscalation($request, 'Nacional');
        }
    }

    protected function logEscalation($request, $level)
    {
        // Notificar o solicitante
        \App\Models\Notification::create([
            'user_id' => $request->requester_id,
            'message' => "Sua solicitação {$request->request_code} foi escalada para o nível {$level} devido ao tempo de espera.",
            'type' => 'hierarchical',
            'related_module' => 'legal',
            'related_id' => $request->id,
        ]);
    }
}
