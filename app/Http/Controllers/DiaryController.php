<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function mydiary()
    {
    	$name = Auth::user()->name;
    	$id = Auth::id();
    	$twits = DB::select('select * from twits where user_id = '.$id);
    	$data = array("twits"=>$twits, "username"=>$name );
        return view('mydiary.list', $data);

    }
}
