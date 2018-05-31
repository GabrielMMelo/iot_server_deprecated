<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tvController extends Controller
{
    public function view($count ,$id){
    	if (view()->exists('tv_'.$count)){
    		return view('tv_'.$count)->with(['id' => $id]);
    	}

    	// Return withError pra dashboard!
    	else
    		return "TV don't exists!";
    }
}
