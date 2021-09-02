<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile($id)
    {
        $profile_id = int($id);
        
        return view('profile.view');
    }
}
