<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $primaryKey = 'id';

    protected $fillable = ['product_id','customer_id','content', 'rating'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
