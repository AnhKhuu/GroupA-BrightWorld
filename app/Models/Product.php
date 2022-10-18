<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'unit', 'price', 'imgUrl', 'description', 'sold', 'inStock'];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function country()
    {
        return $this->hasMany(Country::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function shapeDetail()
    {
        return $this->belongsTo(ShapeDetail::class);
    }

    public function typeDetail()
    {
        return $this->belongsTo(TypeDetail::class);
    }

    public function wattDetail()
    {
        return $this->belongsTo(WattDetail::class);
    }

    public function invoiceDetail()
    {
        return $this->belongsTo(InvoiceDetail::class);
    }

    public function productLiked()
    {
        return $this->belongsTo(ProductLiked::class);
    }
}
