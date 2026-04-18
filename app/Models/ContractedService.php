<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractedService extends Model
{
    protected $fillable = [
        'directory_id',
        'provider_id',
        'type',
        'scope',
        'value',
        'start_date',
        'end_date',
        'contract_path',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
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
