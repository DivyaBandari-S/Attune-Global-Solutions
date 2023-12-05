<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;
    protected $table = 'time_sheets';

    protected $fillable = [
        'emp_id',
        'day',
        'hours',
    ];

    public function employee()
    {
        return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
    }
}
