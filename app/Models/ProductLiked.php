<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLiked extends Model
{
    use HasFactory;

    protected $table = 'product_likes';

    protected $primaryKey = 'id';

    protected $fillable = ['date'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
