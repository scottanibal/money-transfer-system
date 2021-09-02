<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $currencies = File::get('database/data/currencies.json');
        $data = json_decode($currencies);
        foreach($data as $obj)
        {
            DB::table('currencies')->insert([
                'symbol' => $obj->symbol,
                'name' => $obj->name,
                'symbol_native' => $obj->symbol_native,
                'decimal_digits' => $obj->decimal_digits,
                'rounding' => $obj->rounding,
                'alpha_code' => $obj->code,
                'name_plural' => $obj->name_plural
            ]);
        }
    }
}
