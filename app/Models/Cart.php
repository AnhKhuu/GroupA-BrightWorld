<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_id', 'quantity'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function cartDetail()
    {
        return $this->belongsTo(CartDetail::class);
    }

}
