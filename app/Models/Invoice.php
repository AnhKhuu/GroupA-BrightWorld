<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_id', 'invoice_number'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    // public function invoiceDetail()
    // {
    //     return $this->belongsTo(InvoiceDetail::class);
    // }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
