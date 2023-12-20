<?php

namespace App\Http\Controllers;

use App\Models\Histoire;

class WelcomeController extends Controller
{
    public function welcome(){
        $histoires = Histoire::all()->take(3);
        return view('welcome', ['histoires' => $histoires]);
    }
}
