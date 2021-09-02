<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * population of users tables
         */
        $faker = \Faker\Factory::create();
        for($i = 1; $i <= 20; $i++){
            DB::table('users')->insert([
                'name' => $faker->unique()->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'.$i),
            ]);
        }
    }
}
