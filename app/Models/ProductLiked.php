<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLiked extends Model
{
    use HasFactory;

    protected $table = 'product_likes';

    protected $primaryKey = 'id';

    protected $fillable = ['date', 'customer_id'];

    public function productLikeDetail()
    {
        return $this->belongsTo(ProductLikeDetail::class);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
