<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShapeDetail extends Model
{
    use HasFactory;
       
    protected $table = 'shape_details';

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function shape()
    {
        return $this->hasMany(Shape::class);
    }
}
