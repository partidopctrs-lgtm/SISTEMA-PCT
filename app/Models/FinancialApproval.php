<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialApproval extends Model
{
    protected $fillable = [
        'record_id',
        'user_id',
        'status',
        'comments',
    ];

    public function record()
    {
        return $this->belongsTo(FinancialRecord::class, 'record_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
