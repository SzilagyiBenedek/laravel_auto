<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsManufactController;
use App\Http\Controllers\CarsModellController;

// Kezdőoldal – autógyártók listája
Route::get('/', [CarsManufactController::class, 'index'])
    ->name('home');

// Autógyártók CRUD útvonalai
Route::resource('carsManufact', CarsManufactController::class);

// Autómodellek CRUD útvonalai
Route::resource('carsModell', CarsModellController::class);