<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class espController extends Controller
{
    public function store(Request $request){

    	return $request->input('data.id');

    }
}
