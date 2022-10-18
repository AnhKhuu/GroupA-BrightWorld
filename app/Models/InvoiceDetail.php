<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    protected $primaryKey = 'id';

    protected $fillable = ['quantity'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
