<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['type_id','country_id','watt_id','brand_id','sale_id','shape_id', 'name', 'unit', 'price', 'imgUrl', 'description', 'sold', 'inStock'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Brand::class);
    }

    public function watt()
    {
        return $this->belongsTo(Brand::class);
    }

    public function shape()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productLikeDetail()
    {
        return $this->belongsTo(ProductLikeDetail::class);
    }

    public function cartDetail()
    {
        return $this->belongsTo(CartDetail::class);
    }

    public function invoiceDetail()
    {
        return $this->belongsTo(InvoiceDetail::class);
    }
    

}
