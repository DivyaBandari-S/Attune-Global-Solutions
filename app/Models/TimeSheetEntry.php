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

    public function sal()
    {
        return $this->belongsTo(SalesOrder::class, 'emp_id', 'emp_id');
    }
    public function pur()
    {
        return $this->belongsTo(PurchaseOrder::class, 'emp_id', 'emp_id');
    }


    public function hr()
    {
        return $this->belongsTo(HrDetail::class, 'hr_id', 'hr_id');
    }

    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }

    public function cus()
    {
        return $this->belongsTo(CustomerDetails::class, 'customer_id', 'customer_id');
    }
    public function ven()
    {
        return $this->belongsTo(VendorDetails::class, 'vendor_id', 'vendor_id');
    }
}
