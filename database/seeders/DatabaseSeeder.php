<?php

namespace Database\Seeders;

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
        $this->call([
            AgeRangesTableSeeder::class,
            FamilyGroupTableSeeder::class,
            StatusesTableSeeder::class,
            MemberTypesTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}