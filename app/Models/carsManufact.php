<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsManufact extends Model
{
    public $timestamps = false;
    protected $table = 'carsManufact';
    protected $fillable = ['name'];

    public function carsModells()
    {
        return $this->hasMany(CarsModell::class,'carsManufact_id');
    }
}