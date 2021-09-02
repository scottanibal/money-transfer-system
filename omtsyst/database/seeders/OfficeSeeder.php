<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * population of offices table
         */
        $faker = \Faker\Factory::create();
        for($i = 1; $i <= 10; $i++){
            DB::table('offices')->insert([
                'address' => $faker->unique()->address,
                'email' => $faker->unique()->safeEmail(),
                'phone_number' => $faker->unique()->randomNumber(9),
                'country' => rand(1,193),
            ]);
        }
    }
}
