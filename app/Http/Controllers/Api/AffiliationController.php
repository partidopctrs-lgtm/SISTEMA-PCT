<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AffiliationController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'state' => 'required|string',
            'city' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'state' => $validated['state'],
            'city' => $validated['city'],
            'registration_number' => 'PCT-' . strtoupper(Str::random(8)),
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Registration successful.',
            'protocol' => $user->registration_number,
            'user' => $user
        ], 201);
    }

    public function verifyProtocol(Request $request)
    {
        $protocol = $request->input('protocol');
        $user = User::where('registration_number', $protocol)->first();
        
        if ($user) {
            return response()->json([
                'valid' => true,
                'name' => $user->name,
                'status' => $user->status,
                'joined_at' => $user->created_at->format('d/m/Y')
            ]);
        }

        return response()->json(['valid' => false, 'message' => 'Protocol not found.'], 404);
    }

    public function signDocument(Request $request)
    {
        $user = $request->user();
        $documentId = $request->input('document_id');
        
        // Simple digital signature: hash of user ID + document ID + timestamp
        $signature = hash('sha256', $user->id . $documentId . now());
        
        // Save to signatures table (assuming it exists or was created)
        // \App\Models\Signature::create([...]);

        return response()->json([
            'message' => 'Document signed digitally.',
            'signature' => $signature
        ]);
    }
}
