<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = [
        'directory_id',
        'provider_id',
        'category',
        'description',
        'value',
        'date',
        'receipt_path',
        'status',
        'approval_level',
    ];

    protected $casts = [
        'date' => 'date',
        'value' => 'decimal:2',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
