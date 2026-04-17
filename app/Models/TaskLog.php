<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    protected $fillable = [
        'task_id',
        'action',
        'performed_by',
        'notes',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function performedBy()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
