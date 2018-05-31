<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tvController extends Controller
{
    public function view($count ,$id){
    	return view('tv_'.$count)->with(['id' => $id]);
    }
}
