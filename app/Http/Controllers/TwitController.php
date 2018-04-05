<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Twit as Twit;
use App\User as User;

class TwitController extends Controller
{

	public function __construct() {
		//$this->middleware('auth');
	}

    public function getall($user_id) {
        $twits = Twit::where('user_id',$user_id)->get();
        return view();
    }

    public function create(Request $request) {
    	$user = Auth::user();
    	if ($user == null)
    		return "";
    	$twit = Twit::create(["likes"=>0, "name" => "", "twit"=>$request->twit, "user_id"=>$user->id]);
    	return view("twit", ["twit"=>$twit, "diary_user"=>$user]);
    }

    public function delete(Request $request, $id)
    {
    	$user = Auth::user();
    	if ($user == null)
    		return -1;
        $twit = Twit::where('user_id',$user->id)->where('id',$id)->first();
        if($twit == null)
        	return -1;
        $twit->delete();
        return 204;
    }
}
