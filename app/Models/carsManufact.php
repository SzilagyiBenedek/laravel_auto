<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsModell extends Model
{
    public $timestamps = false;

    /**
     * Tömegesen kitölthető mezők.
     */
    protected $fillable = ['name'];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
}