<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $primaryKey = 'id';

    protected $fillable = ['product_id', 'cart_id', 'quantity'];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'customer_id', 'id');
    }
}
