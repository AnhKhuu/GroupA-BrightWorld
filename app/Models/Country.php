<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'full_name', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
