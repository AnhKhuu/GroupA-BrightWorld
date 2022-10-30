<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = ['short_name', 'full_name', 'address', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
