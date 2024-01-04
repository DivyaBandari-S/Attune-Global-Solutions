<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOPO extends Model
{
    use HasFactory;
    protected $table = 'sopos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sopo_number',
        'so_number',
        'po_number',
    ];

    // Define relationships with other models
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class, 'so_number', 'so_number');
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_number', 'po_number');
    }
}
