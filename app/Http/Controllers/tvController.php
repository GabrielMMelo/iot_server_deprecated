<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tvController extends Controller
{
    public function view(){
    	return view('tv')->with(['id' => '1']);
    }
}
