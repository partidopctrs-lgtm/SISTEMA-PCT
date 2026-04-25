<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApoioPartidoLog extends Model
{
    protected $table = 'apoio_partido_logs';

    protected $fillable = [
        'user_id',
        'decisao',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'decisao' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
