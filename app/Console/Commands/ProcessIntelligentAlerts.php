<?php

namespace App\Console\Commands;

use App\Models\Goal;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessIntelligentAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pct:process-alerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process movement goals and send intelligent alerts to directors.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting intelligent alerts process...');

        // 1. Update all goals progress
        $goals = Goal::all();
        foreach ($goals as $goal) {
            if ($goal->type === 'state') {
                $count = User::where('state', $goal->location_name)->count();
            } else {
                $count = User::where('city', $goal->location_name)->count();
            }

            $goal->current_members = $count;
            $ratio = $goal->target_members > 0 ? ($count / $goal->target_members) : 1;

            if ($ratio >= 0.8) {
                $goal->status = 'on_track';
            } elseif ($ratio >= 0.5) {
                $goal->status = 'at_risk';
            } else {
                $goal->status = 'critical';
                $this->triggerAlert($goal);
            }

            $goal->save();
        }

        // 2. National Red Alert Check
        $totalMembers = User::count();
        $recentMembers = User::where('created_at', '>=', now()->subDays(7))->count();
        
        if ($recentMembers < ($totalMembers * 0.01)) { // Growth less than 1% per week
            $this->triggerNationalRedAlert();
        }

        $this->info('Alerts processed successfully.');
    }

    private function triggerAlert(Goal $goal)
    {
        Log::warning("Goal for {$goal->location_name} is CRITICAL. Current: {$goal->current_members}/{$goal->target_members}");
        
        // Notify directors of this location
        $directors = User::where('role', 'admin') // Simplified: should find local directors
            ->get();

        foreach ($directors as $director) {
            Notification::create([
                'user_id' => $director->id,
                'title' => "ALERTA CRÍTICO: Meta de {$goal->location_name}",
                'message' => "A meta de {$goal->location_name} está em nível crítico ({$goal->current_members}/{$goal->target_members}). Ação imediata necessária.",
                'type' => 'alert_goal'
            ]);
        }
    }

    private function triggerNationalRedAlert()
    {
        Log::error("NATIONAL RED ALERT: Growth is stagnation!");
        
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'title' => "🚩 ALERTA VERMELHO NACIONAL",
                'message' => "O crescimento nacional estagnou nos últimos 7 dias. Verifique o painel de BI imediatamente.",
                'type' => 'alert_national'
            ]);
        }
    }
}
