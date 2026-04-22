<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfringementNotice extends Model
{
    protected $fillable = [
        'notice_id',
        'year',
        'entity',
        'municipality_name',
        'description',
    ];

    public function municipality()
    {
        return $this->belongsTo(MunicipalityReference::class, 'municipality_name', 'name');
    }
}
