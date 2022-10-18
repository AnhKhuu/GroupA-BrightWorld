<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WattDetail extends Model
{
    use HasFactory;

    protected $table = 'watt_details';

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function watt()
    {
        return $this->hasMany(Watt::class);
    }
}
