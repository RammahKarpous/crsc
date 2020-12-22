<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeRangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_ranges')->insert([
            ['age_range' => 'Juniors (Under 14)'],
            ['age_range' => 'Seniors (14 - 16)']
        ]);
    }
}