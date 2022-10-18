<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watt extends Model
{
    use HasFactory;

    protected $table = 'watts';

    protected $primaryKey = 'id';

    protected $fillable = ['description'];

    public function wattDetail()
    {
        return $this->belongsTo(WattDetail::class);
    }
}
