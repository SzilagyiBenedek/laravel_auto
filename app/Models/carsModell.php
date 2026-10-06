<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsModell extends Model
{

    public $timestamps = false;
    protected $table = 'carsModell';
    protected $fillable = [
        'name',
        'year',
        'carsManufact_id'
    ];

    public function carsManufact()
    {
        return $this->belongsTo(CarsManufact::class,'carsManufact_id');
    }
}
