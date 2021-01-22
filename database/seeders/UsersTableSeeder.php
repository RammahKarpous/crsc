<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'family_group_id' => null,
            'member_type_id' => 3,
            'event_id' => null,
            'gender' => 'male',
            'dob' => '1994-09-28',
            'status_id' => 2,
            'name' => 'Rammah',
            'slug' => 'rammah',
            'email' => 'admin@crsc.com',
            'password' => Hash::make('admin'),
            'lane' => null,
            'result' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}