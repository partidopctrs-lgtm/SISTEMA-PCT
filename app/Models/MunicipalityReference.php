<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MunicipalityReference extends Model
{
    protected $fillable = [
        'name',
        'has_universalization_meta',
        'adhered_to_prae',
        'pmsb_status',
        'is_corsan_system',
    ];

    protected $casts = [
        'has_universalization_meta' => 'boolean',
        'adhered_to_prae' => 'boolean',
        'is_corsan_system' => 'boolean',
    ];

    public function notices()
    {
        return $this->hasMany(InfringementNotice::class, 'municipality_name', 'name');
    }
}
