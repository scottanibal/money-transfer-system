<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConvertCurrencyController extends Controller
{
    //
    function postForm(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        unset($request['save']);

        $currencies = File::get(config('exchangerate.path') . "/exchangerate.json");
        $data = json_decode($currencies, true);
        $exist = false;

        foreach($data as $key => $value)
        {
            // if the currency exist make an update
            if($value['currency'] == $request['currency']){
                $data[$key] = $request;
                $exist = true;
                break;
            }
        }
        // if the currency does not exist, add
        if(!$exist){
            $data[] = $request;
        }
        file_put_contents(config('exchangerate.path') . "/exchangerate.json", json_encode($data));

        return redirect()->back()->with('msg', 'Update successfully');
    }
}
