<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents')->insert([
            'group_id' => 1,
            'name' => 'John',
            'member_type' => 'parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}