<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $lonLatArr = [
            ['53.5553', '9.995'],
            ['51.1', '2.5833'],
            ['48.9667', '2.25'],
            ['49.4958', '5.9806'],
            ['51.4935', '-0.242463'],
            ['51.2667', '1.0833'],
            ['48.15', '11.5833'],
            ['52.5333', '-1.3667'],
            ['51.6657', '5.6183'],
            ['52.557', '5.9167'],
            ['51.05', '13.75'],
            ['48.8628', '2.3292'],
            ];

        foreach($lonLatArr as $lonLat) {
            Track::create([
               'lon' => $lonLat[0],
               'lat' => $lonLat[1]
            ]);
        }

    }
}
