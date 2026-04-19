<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryAction extends Model
{
    protected $fillable = [
        'directory_id',
        'user_id',
        'action',
        'level',
        'reason'
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
