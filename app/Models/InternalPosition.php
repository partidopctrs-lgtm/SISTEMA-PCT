<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalPosition extends Model
{
    protected $fillable = ['title', 'level', 'hierarchy_weight'];

    public function users()
    {
        return $this->hasMany(User::class, 'position_id');
    }
}
