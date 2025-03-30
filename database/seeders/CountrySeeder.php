<?php

namespace Database\Seeders;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $coutries = ['Damascus', 'Homs', 'Aleppo'];
        foreach ($coutries as $country) {
            Country::create(['name' => $country]);
        }
    }
}
