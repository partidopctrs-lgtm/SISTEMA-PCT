<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitation extends Model
{
    protected $fillable = [
        'directory_id',
        'destination',
        'type',
        'priority',
        'subject',
        'description',
        'attachment_path',
        'status',
        'response',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }
}
