<?php

namespace Database\Seeders;


use App\Models\Industry;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $industries = ['tec', 'app'];
        foreach ($industries as $industry) {
            Industry::create(['name' => $industry]);
        }
    }
}
