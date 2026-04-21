<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEvidence extends Model
{
    use HasFactory;

    protected $fillable = ['water_report_id', 'file_path', 'file_type', 'file_size'];

    public function report()
    {
        return $this->belongsTo(WaterReport::class, 'water_report_id');
    }
}
