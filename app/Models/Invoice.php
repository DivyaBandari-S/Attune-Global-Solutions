<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'amount',
        'due_date',
        'payment_terms',
        'description',
        'status',
        'currency',
        'notes',
        'company_id','type','emp_id','rate','period','hrs_or_days','open_balance'
    ];
    public function emp()
    {
        return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
    }
    public function customer()
    {
        return $this->belongsTo(CustomerDetails::class, 'customer_id', 'customer_id');
    }

    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
}
