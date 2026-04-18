<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DevDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'server' => $this->getServerStats(),
            'database' => $this->getDatabaseStats(),
            'application' => [
                'laravel_version' => app()->version(),
                'php_version' => PHP_VERSION,
                'environment' => app()->environment(),
                'debug_mode' => config('app.debug'),
            ],
            'security' => [
                'failed_logins_today' => 0, // Mock por enquanto
                'blocked_ips' => 0,
            ]
        ];

        return view('pages.dev.dashboard', compact('stats'));
    }

    public function health()
    {
        $services = [
            ['name' => 'Web Server (Nginx)', 'status' => 'online', 'latency' => '12ms'],
            ['name' => 'Database (MySQL)', 'status' => 'online', 'latency' => '5ms'],
            ['name' => 'PHP-FPM', 'status' => 'online', 'latency' => '2ms'],
            ['name' => 'Storage Acessível', 'status' => 'online', 'latency' => '-'],
            ['name' => 'Cache (File)', 'status' => 'online', 'latency' => '-'],
            ['name' => 'Queue Worker', 'status' => 'offline', 'latency' => '-'],
        ];

        return view('pages.dev.health', compact('services'));
    }

    public function logs()
    {
        $logPath = storage_path('logs/laravel.log');
        $logs = "";
        
        if (File::exists($logPath)) {
            // Pegar as últimas 100 linhas do log
            $file = new \SplFileObject($logPath, 'r');
            $file->seek(PHP_INT_MAX);
            $totalLines = $file->key();
            
            $start = max(0, $totalLines - 100);
            $logs = "";
            $file->seek($start);
            while (!$file->eof()) {
                $logs .= $file->current();
                $file->next();
            }
        } else {
            $logs = "Arquivo de log não encontrado.";
        }

        return view('pages.dev.logs', compact('logs'));
    }

    private function getServerStats()
    {
        $stats = [
            'cpu_usage' => 0,
            'ram_usage' => 0,
            'disk_usage' => 0,
            'uptime' => 'Indisponível',
            'os' => PHP_OS,
        ];

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows Stats (Mocks ou básicos)
            $stats['uptime'] = 'N/A (Windows)';
            $stats['cpu_usage'] = 15; // Mock
        } else {
            // Linux Stats
            try {
                $load = sys_getloadavg();
                $stats['cpu_usage'] = $load[0] * 10; // Estimativa simples
                
                $free = shell_exec('free -m');
                $free = (string)trim($free);
                $free_arr = explode("\n", $free);
                $mem = explode(" ", preg_replace('/\s+/', ' ', $free_arr[1]));
                $stats['ram_usage'] = round(($mem[2] / $mem[1]) * 100, 2);
                
                $stats['uptime'] = shell_exec('uptime -p');
            } catch (\Exception $e) {
                // Fail silently
            }
        }

        // Disk usage (Funciona em ambos)
        $total = disk_total_space("/");
        $free = disk_free_space("/");
        $stats['disk_usage'] = round((($total - $free) / $total) * 100, 2);

        return $stats;
    }

    private function getDatabaseStats()
    {
        try {
            $results = DB::select('SELECT 1');
            $status = 'online';
        } catch (\Exception $e) {
            $status = 'offline';
        }

        return [
            'status' => $status,
            'connection' => config('database.default'),
            'size' => 'Calculando...',
        ];
    }

    // Métodos do Portal DEV
    public function infra() { return $this->index(); }
    public function security() { return $this->index(); }
    public function database() { return $this->index(); }
    public function backups() { return view('pages.dev.backups'); }
    public function queues() { return $this->index(); }
    public function integrations() { return $this->index(); }
    public function domains() { return $this->index(); }
    public function support() { return $this->index(); }
    public function environments() { return $this->index(); }
    public function config() { return view('pages.dev.config'); }
}
