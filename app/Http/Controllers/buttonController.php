<?php

namespace App\Http\Controllers;

use App\Events\Button;
use Illuminate\Http\Request;

class buttonController extends Controller
{
    public function view(){
    	return view('dashboard')->with(['tv' => '1']);
    }

    public function store(Request $request){
    	event(new Button($request->input('id'), $request->input('value'), $request->input('value_2')));
    	return redirect()->back();
    }
}
