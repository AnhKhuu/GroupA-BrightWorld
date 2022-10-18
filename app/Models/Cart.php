<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $primaryKey = 'id';

    protected $fillable = ['product_id', 'customer_id', 'quantity'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'product_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'customer_id', 'id');
    }
}
