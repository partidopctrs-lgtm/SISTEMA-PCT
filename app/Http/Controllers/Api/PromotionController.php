<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromotionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Submit a promotion request with assembly minutes (ATA).
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'target_role' => 'required|string',
            'ata_file' => 'required|file|mimes:pdf|max:5120', // Max 5MB PDF
        ]);

        $user = $request->user();
        
        $path = $request->file('ata_file')->store('atas', 'public');

        $promotionRequest = PromotionRequest::create([
            'user_id' => $user->id,
            'target_role' => $validated['target_role'],
            'ata_file_path' => $path,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Promotion request submitted for review.',
            'request' => $promotionRequest
        ], 201);
    }

    /**
     * Admin: Approve or reject a promotion request.
     */
    public function review(Request $request, PromotionRequest $promotionRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'reviewer_notes' => 'nullable|string',
        ]);

        $promotionRequest->status = $validated['status'];
        $promotionRequest->reviewer_notes = $validated['reviewer_notes'];
        $promotionRequest->reviewer_id = $request->user()->id;
        $promotionRequest->save();

        if ($promotionRequest->status === 'approved') {
            $user = $promotionRequest->user;
            $user->role = $promotionRequest->target_role;
            $user->save();
        }

        return response()->json([
            'message' => "Request {$validated['status']} successfully.",
            'request' => $promotionRequest
        ]);
    }

    /**
     * List all pending requests (Admin).
     */
    public function index()
    {
        return response()->json(PromotionRequest::with('user:id,name,email')->where('status', 'pending')->get());
    }
}
