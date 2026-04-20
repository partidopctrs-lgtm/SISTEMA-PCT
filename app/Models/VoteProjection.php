<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteProjection extends Model
{
    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }
}
