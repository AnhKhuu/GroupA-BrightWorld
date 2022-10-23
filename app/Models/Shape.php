<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    protected $table = 'shapes';

    protected $primaryKey = 'id';

    protected $fillable = ['description'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
