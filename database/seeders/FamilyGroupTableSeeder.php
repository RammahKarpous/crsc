<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('family_groups')->insert([
            'family_name' => 'Johnson',
            'address_line' => '47 Solihull Road',
            'place' => 'Birmingham',
            'postcode' => 'B11 3NS',
            'contact_number' => '07 345 678 890',
            'email' => 'thejohnson@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}