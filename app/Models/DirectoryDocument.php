<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectoryDocument extends Model
{
    protected $fillable = [
        'directory_id',
        'category',
        'title',
        'file_path',
        'status',
        'notes',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }
}
