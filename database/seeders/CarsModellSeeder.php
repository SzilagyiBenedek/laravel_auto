<?php

namespace Database\Seeders;

use App\Models\CarsModell;
use App\Models\CarsManufact;
use Illuminate\Database\Seeder;

class CarsModellSeeder extends Seeder
{
    public function run(): void
    {
        // Minden gyártóhoz létrehozunk néhány autómodellt

        $carsManufacts = CarsManufact::all();

        foreach ($carsManufacts as $carsManufact) {

            CarsModell::create([
                'name' => $carsManufact->name . ' Modell 1',
                'year' => 2020,
                'carsManufact_id' => $carsManufact->id,
            ]);

            CarsModell::create([
                'name' => $carsManufact->name . ' Modell 2',
                'year' => 2022,
                'carsManufact_id' => $carsManufact->id,
            ]);
        }
    }
}