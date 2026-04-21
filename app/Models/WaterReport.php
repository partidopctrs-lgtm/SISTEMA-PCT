<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'protocol',
        'name',
        'city',
        'neighborhood',
        'problem_type',
        'description',
        'event_date',
        'photo',
        'contact',
        'affiliate_id',
        'status',
        'gravity',
        'latitude',
        'longitude',
        'is_urgent',
        'is_collective',
        'is_recurrent'
    ];

    protected static function booted()
    {
        static::creating(function ($report) {
            if (!$report->protocol) {
                $report->protocol = 'PCT-AGUA-' . date('Y') . '-' . strtoupper(bin2hex(random_bytes(3)));
            }
        });
    }

    public function evidences()
    {
        return $this->hasMany(ReportEvidence::class);
    }

    public function notes()
    {
        return $this->hasMany(ReportNote::class);
    }

    public function forwardings()
    {
        return $this->hasMany(ReportForwarding::class);
    }

    public function affiliate()
    {
        return $this->belongsTo(User::class, 'affiliate_id');
    }
}
