<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SwimmersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('swimmers')->insert([
            'group_id' => 1,
            'name' => 'Swimmer',
            'gender' => 'Female',
            'dob' => '23.01.2006',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}