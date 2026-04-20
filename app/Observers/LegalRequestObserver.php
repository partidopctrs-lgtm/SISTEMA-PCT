<?php

namespace App\Observers;

use App\Models\LegalRequest;

class LegalRequestObserver
{
    /**
     * Handle the LegalRequest "created" event.
     */
    public function created(LegalRequest $legalRequest): void
    {
        // 1. Criar tarefa automática vinculada à solicitação
        $task = \App\Models\Task::create([
            'task_code' => 'TASK-L-' . strtoupper(bin2hex(random_bytes(3))),
            'title' => 'Análise de Solicitação Jurídica: ' . $legalRequest->title,
            'description' => 'Solicitação enviada por ' . $legalRequest->requester->full_name . ' (' . $legalRequest->request_type . ')',
            'status' => 'new',
            'module' => 'legal',
            'priority' => $legalRequest->priority,
            'committee_id' => $legalRequest->directory_id,
            'due_date' => now()->addHours(48), // Prazo padrão do manual JUR-001
        ]);

        // 2. Registrar no log da tarefa
        \App\Models\TaskLog::create([
            'task_id' => $task->id,
            'action' => 'created',
            'performed_by' => $legalRequest->requester_id,
            'notes' => 'Tarefa gerada automaticamente via Sistema Jurídico.',
        ]);

        // 3. Gerar Notificação para o departamento
        \App\Models\Notification::create([
            'user_id' => $legalRequest->requester_id, // Notificar o solicitante que foi aberta
            'title' => 'Nova Solicitação Jurídica',
            'message' => 'Sua solicitação jurídica ' . $legalRequest->request_code . ' foi aberta e uma tarefa foi gerada.',
            'type' => 'operational',
            'related_module' => 'legal',
            'related_id' => $legalRequest->id,
        ]);
    }

    /**
     * Handle the LegalRequest "updated" event.
     */
    public function updated(LegalRequest $legalRequest): void
    {
        //
    }

    /**
     * Handle the LegalRequest "deleted" event.
     */
    public function deleted(LegalRequest $legalRequest): void
    {
        //
    }

    /**
     * Handle the LegalRequest "restored" event.
     */
    public function restored(LegalRequest $legalRequest): void
    {
        //
    }

    /**
     * Handle the LegalRequest "force deleted" event.
     */
    public function forceDeleted(LegalRequest $legalRequest): void
    {
        //
    }
}
