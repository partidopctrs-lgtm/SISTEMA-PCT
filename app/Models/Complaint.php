<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'complaint_code',
        'complaint_type',
        'name',
        'email',
        'city',
        'state',
        'target_name',
        'directory_id',
        'infraction_type',
        'description',
        'evidence_url',
        'status',
        'severity',
        'resolution_notes',
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }
}
