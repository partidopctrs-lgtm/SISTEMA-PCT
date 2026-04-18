<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reimbursement extends Model
{
    protected $fillable = [
        'directory_id',
        'user_id',
        'category',
        'justification',
        'value',
        'receipt_path',
        'status',
    ];

    protected $casts = [
        'value' => 'decimal:2',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
