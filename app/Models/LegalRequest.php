<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalRequest extends Model
{
    protected $fillable = [
        'request_code',
        'requester_id',
        'requester_profile_type',
        'directory_id',
        'title',
        'description',
        'request_type',
        'priority',
        'status',
        'assigned_to',
        'level',
        'closed_at',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function messages()
    {
        return $this->hasMany(LegalRequestMessage::class);
    }
}
