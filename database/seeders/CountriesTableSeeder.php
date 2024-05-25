<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['short_name' => 'US', 'name' => 'United States', 'phone_code' => '+1'],
            ['short_name' => 'CA', 'name' => 'Canada', 'phone_code' => '+1'],
            ['short_name' => 'GB', 'name' => 'United Kingdom', 'phone_code' => '+44'],
            ['short_name' => 'PK', 'name' => 'Pakistan', 'phone_code' => '+92'],
            ['short_name' => 'IN', 'name' => 'India', 'phone_code' => '+91'],
        ]);
    }
}
