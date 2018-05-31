<?php

namespace App\Http\Controllers;

use App\Tv;

use DB;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function view(){
    	$list_tvs = DB::select('SELECT count, id_esp, owner
    							FROM tvs;');
    	return view('dashboard')->with(['tvs' => $list_tvs]);
    }
}
