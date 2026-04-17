<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'directory_id',
        'membership_status',
        'joined_at',
        'approved_by',
        'source',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }
}
