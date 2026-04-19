<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryReview extends Model
{
    protected $fillable = [
        'directory_id',
        'review_type',
        'status',
        'review_notes',
        'reviewed_by',
        'reviewed_at'
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}