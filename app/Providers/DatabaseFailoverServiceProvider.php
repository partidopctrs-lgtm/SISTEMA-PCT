<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Exception;

class DatabaseFailoverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Avoid running during core CLI maintenance commands to prevent recursion
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->ensureDatabaseConnection();
    }


    /**
     * Ensure the database is connected, otherwise fallback to VPS.
     */
    protected function ensureDatabaseConnection(): void
    {
        $defaultConnection = config('database.default');
        
        // Cache the failure status for 5 minutes if it was already detected
        if (Cache::get('database_local_failed')) {
            $this->switchToVps();
            return;
        }

        try {
            // Attempt to get the PDO instance for the default connection
            // The timeout is usually defined in the config/database.php options
            DB::connection($defaultConnection)->getPdo();
        } catch (Exception $e) {
            // If local connection fails, log it and switch to VPS
            Log::warning("Local database connection failed: " . $e->getMessage() . ". Switching to VPS.");
            
            // Mark as failed in cache for 5 minutes to avoid probing on every request
            Cache::put('database_local_failed', true, 300);
            
            $this->switchToVps();
        }
    }

    /**
     * Programmatically switch the default connection to 'vps'.
     */
    protected function switchToVps(): void
    {
        config(['database.default' => 'vps']);
        
        // Re-reconnect the DB manager with the new default
        DB::purge();
        DB::reconnect('vps');
    }
}
