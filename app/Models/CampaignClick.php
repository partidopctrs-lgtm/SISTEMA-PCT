<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignClick extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'campaign_name',
        'ip_address',
        'user_agent'
    ];

    public function affiliate()
    {
        return $this->belongsTo(User::class, 'affiliate_id');
    }
}
