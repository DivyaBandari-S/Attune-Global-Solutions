<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheetEntry extends Model
{
    use HasFactory;
        protected $table = 'time_sheet_entries';
        public $entryId;
     
        protected $fillable = [
            'emp_id',
            'hr_id',
            'company_id',
            'day',
            'status',
        ];
        protected $casts = [
            'day' => 'array',
            'hr_id' => 'array',
            'status' => 'string',
        ];
        public function employee()
        {
            return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
        }
     
        public function hr()
        {
            return $this->belongsTo(HrDetail::class, 'hr_id', 'hr_id');
        }
     
        public function company()
        {
            return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
        }
    }
     
