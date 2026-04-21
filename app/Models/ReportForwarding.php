<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportForwarding extends Model
{
    use HasFactory;

    protected $fillable = ['water_report_id', 'from_user_id', 'to_sector', 'reason', 'status'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function report()
    {
        return $this->belongsTo(WaterReport::class, 'water_report_id');
    }
}
