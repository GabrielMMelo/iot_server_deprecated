<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tv_1Controller extends Controller
{
    public function view(){
    	return view('tv_1')->with(['id' => '1']);
    }
}
