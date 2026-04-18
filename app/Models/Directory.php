<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $fillable = [
        'name',
        'directory_type',
        'city',
        'state',
        'status',
    ];
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
