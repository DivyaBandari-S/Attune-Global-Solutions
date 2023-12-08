<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bill_number',
        'vendor_id',
        'amount',
        'due_date',
        'payment_terms',
        'description',
        'status',
        'currency',
        'notes',
        'company_id','type','emp_id','rate','period','hrs_or_days','open_balance'
    ];

    public function vendor()
    {
        return $this->belongsTo(VendorDetails::class,'vendor_id','vendor_id');
    }

    public function emp()
    {
        return $this->belongsTo(EmpDetails::class,'emp_id','emp_id');
    }
    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id','company_id');
    }
}
