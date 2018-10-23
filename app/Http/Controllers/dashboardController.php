<?php

namespace App\Http\Controllers;

use App\Tv;

use DB;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function view(){
    	$list_tvs = DB::select('SELECT count, id_esp, local
    							FROM tvs;');
    	$list_light_nodes  = DB::select('SELECT count, id_esp, local
    									 FROM nodes
    									 WHERE device = "LIGHT"
    									 ;');
    	return view('dashboard')->with(['tvs' => $list_tvs, 'lights' => $list_light_nodes]);
    }
}
