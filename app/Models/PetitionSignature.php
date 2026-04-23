<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetitionSignature extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'signed_at' => 'datetime',
    ];
}
