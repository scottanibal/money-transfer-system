<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserOfficeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 1; $i <= 27; $i++){
            DB::table('user_office')->insert([
                'username' => $faker->unique()->username,
                'phone_number' => $faker->unique()->randomNumber(9),
                'user' => rand(1, 20),
                'office' => rand(2, 11),
                'admin' => rand(0, 1)
            ]);
        }
    }
}
