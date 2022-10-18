<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDetail extends Model
{
    use HasFactory;

    protected $table = 'type_details';

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function type()
    {
        return $this->hasMany(Type::class);
    }
}
