<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    protected $fillable = [
        'directory_id',
        'type',
        'category',
        'amount',
        'description',
        'proof_url',
        'status',
        'approved_by',
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
