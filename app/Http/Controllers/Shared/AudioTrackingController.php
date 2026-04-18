<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AudioInteraction;

class AudioTrackingController extends Controller
{
    public function track(Request $request)
    {
        $request->validate([
            'type' => 'required|in:play,download',
            'metadata' => 'nullable|array',
        ]);

        AudioInteraction::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'ip_address' => $request->ip(),
            'location' => $this->getLocationFromIp($request->ip()),
            'metadata' => $request->metadata,
        ]);

        return response()->json(['success' => true]);
    }

    private function getLocationFromIp($ip)
    {
        // Simplificado: Em produção usaria um serviço como ip-api.com ou GeoIP
        if ($ip === '127.0.0.1') return 'Localhost (Dev)';
        
        try {
            $response = file_get_contents("http://ip-api.com/json/{$ip}?fields=city,regionName,country");
            $data = json_decode($response, true);
            if ($data && isset($data['city'])) {
                return "{$data['city']}, {$data['regionName']} - {$data['country']}";
            }
        } catch (\Exception $e) {
            return 'Desconhecido';
        }

        return 'Desconhecido';
    }
}
