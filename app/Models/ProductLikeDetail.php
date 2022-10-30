<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLikeDetail extends Model
{
    use HasFactory;

    protected $table = 'product_like_details';

    protected $primaryKey = 'id';

    protected $fillable = ['product_id', 'product_like_id'];

    public function customer()
    {
        return $this->hasMany(ProductLiked::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
