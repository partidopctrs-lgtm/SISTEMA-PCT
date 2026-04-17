<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_code',
        'title',
        'description',
        'status',
        'module',
        'priority',
        'assigned_to',
        'committee_id',
        'due_date',
        'created_by',
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function committee()
    {
        return $this->belongsTo(Directory::class, 'committee_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function logs()
    {
        return $this->hasMany(TaskLog::class);
    }
}
