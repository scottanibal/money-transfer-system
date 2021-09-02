<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $countries = File::get("database/data/countries.json");
        $data = json_decode($countries);

        foreach($data as $obj){
            DB::table('countries')->insert([
                'name' => $obj->name,
                'alpha2' => $obj->alpha2,
                'alpha3' => $obj->alpha3,
                'num' => $obj->id,
                'flag'=> $obj->alpha2 . '.png'
            ]);
        }
    }
}
