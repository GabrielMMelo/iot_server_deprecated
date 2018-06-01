<?php

namespace App\Http\Controllers;

use App\Tv;

use Illuminate\Http\Request;

class tvController extends Controller
{
    public function view($count ,$id){
    	if (view()->exists('tv_'.$count)){
    		$model = Tv::select('model')->where('count','=',$count)->where('id_esp', '=', $id)->get();
    		return view('tv_'.$count)->with(['id' => $id, 'model' => $model[0]->model]);
    	}

    	// Return withError pra dashboard!
    	else
    		return "TV don't exists!";
    }
}
