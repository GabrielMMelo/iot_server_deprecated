<?php

namespace App\Http\Controllers;

use App\Events\Button;
use Illuminate\Http\Request;

class buttonController extends Controller
{
    # Método que dispara o evento de broadcast
    public function store(Request $request){
    	event(new Button($request->input('id'), $request->input('value'), $request->input('type'), $request->input('model'), $request->input('value_2')));
    	return redirect()->back();
    }
}
