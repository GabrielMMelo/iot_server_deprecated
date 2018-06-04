<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nodeController extends Controller
{
     public function view($count ,$id){
    	if (view()->exists('node_'.$count)){
    		$model = Tv::select('model')->where('count','=',$count)->where('id_esp', '=', $id)->get();
    		return view('tv_'.$count)->with(['id' => $id, 'model' => $model[0]->model]);
    	}

    	// Return withError pra dashboard!
    	else
    		return "Node don't exists!";
    }
}
