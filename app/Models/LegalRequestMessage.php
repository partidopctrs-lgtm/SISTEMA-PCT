<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalRequestMessage extends Model
{
    protected $fillable = [
        'legal_request_id',
        'user_id',
        'message',
        'attachment_url',
    ];

    public function legalRequest()
    {
        return $this->belongsTo(LegalRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
