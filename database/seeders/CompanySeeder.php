<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Test 1 name',
            'phone' => '0117811111',
            'email' => 'example@gmail.com',
            'industry' => 'yyyy',
            'country_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Company::create([
            'name' => 'Test 2 name',
            'phone' => '0117822222',
            'email' => 'Test@gmail.com',
            'industry' => 'xxxx',
            'country_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
