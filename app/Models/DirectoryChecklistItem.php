<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryChecklistItem extends Model
{
    protected $fillable = [
        'directory_id',
        'item_code',
        'item_name',
        'is_required',
        'is_delivered',
        'is_verified',
        'verified_by',
        'verified_at',
        'notes'
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}