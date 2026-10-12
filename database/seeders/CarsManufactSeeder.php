<?php

namespace Database\Seeders;

use App\Models\CarsModell;
use App\Models\CarsManufact;
use Illuminate\Database\Seeder;

class CarsModellSeeder extends Seeder
{
    public function run(): void
    {
        $carsManufacts = CarsManufact::all();

        if ($carsManufacts->isEmpty()) {
            return;
        }

        $models = [
            ['name' => 'Corolla', 'year' => 2020],
            ['name' => 'Yaris', 'year' => 2021],
            ['name' => 'Golf', 'year' => 2019],
            ['name' => 'Passat', 'year' => 2022],
            ['name' => 'C-Class', 'year' => 2020],
        ];

        foreach ($models as $index => $model) {
            CarsModell::create([
                'name' => $model['name'],
                'year' => $model['year'],
                'carsManufact_id' => $carsManufacts[$index % $carsManufacts->count()]->id,
            ]);
        }
    }
}