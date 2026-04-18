<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    protected $fillable = [
        'directory_id',
        'name',
        'document_number',
        'email',
        'phone',
        'type',
        'status',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(ContractedService::class);
    }
}
