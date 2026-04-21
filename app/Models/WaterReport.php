<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'neighborhood',
        'problem_type',
        'description',
        'event_date',
        'photo',
        'contact',
        'affiliate_id'
    ];

    public function affiliate()
    {
        return $this->belongsTo(User::class, 'affiliate_id');
    }
}
