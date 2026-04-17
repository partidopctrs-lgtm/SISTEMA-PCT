<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'profile_type',
        'level',
        'is_primary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
