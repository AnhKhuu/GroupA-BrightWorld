<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    
    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = ['first_name', 'last_name', 'phone_number', 'address', 'zip ', 'email', 'user_name', 'password'];

    protected $hidden = ['password'];

    public function productLike()
    {
        return $this->belongsTo(ProductLiked::class);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
