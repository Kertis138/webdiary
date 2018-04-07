<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Twit as Twit;
use App\User as User;
use App\Sub as Sub;

class FollowController extends Controller
{

	public function __construct() {
		//$this->middleware('auth');
	}

    public function read_diary($login) {
        $user = Auth::user();
        if ($user == null)
            return redirect()->route("login");     

        if ($user->login == $login)
            return redirect()->back();

        $toUser = User::where("login", $login)->first();
        if ($toUser == null)
            return abort(404);


        $me = Sub::where("follow_id",$user->id)->where("user_id",$toUser->id)->first();
        if($me !== null)
            return abort(500);

        Sub::create(["user_id"=>$toUser->id, "follow_id"=>$user->id]);

        return redirect()->back();
    }

    public function notread_diary($login) {
        $user = Auth::user();
        
        if ($user == null)
            return redirect()->route("login");     
        
        if ($user->login == $login)
            return redirect()->back();

        $toUser = User::where("login", $login)->first();
        if ($toUser == null)
            return abort(404);

        $me = Sub::where("follow_id",$user->id)->where("user_id",$toUser->id)->first();
        if($me == null)
            return abort(404);

        $find = Sub::where(["user_id"=>$toUser->id, "follow_id"=>$user->id]);
        if($find != null)
            $find->delete();

        return redirect()->back();
    }

    public function followers($login) {
        
		$toUser = User::where("login", $login)->first();
        if ($toUser == null)
            return abort(404);

		$findall = Sub::where("user_id",$toUser->id)->get();
		$users = array();
		for ($i=0; $i<count($findall); $i++)
			array_push($users, User::where("id",$findall[$i]->follow_id)->first());

		$twits = Twit::where('user_id',$toUser->id)->get()->sortByDesc("created_at");
        $subs = Sub::where('follow_id', $toUser->id)->get();

		return view("followers", ["follows_user"=>$users, "diary_user"=>$toUser, "twits"=>$twits, "subs"=>$subs, "follows"=>$findall]);
    }

    public function read($login) {
        
		$toUser = User::where("login", $login)->first();
        if ($toUser == null)
            return abort(404);

		$findall = Sub::where("follow_id",$toUser->id)->get();
		$users = array();
		for ($i=0; $i<count($findall); $i++)
			array_push($users, User::where("id",$findall[$i]->user_id)->first());

		$twits = Twit::where('user_id',$toUser->id)->get()->sortByDesc("created_at");

        $follows = Sub::where("user_id",$toUser->id)->get();
        $subs = Sub::where('follow_id', $toUser->id)->get();

		return view("read", ["follows_user"=>$users, "diary_user"=>$toUser, "twits"=>$twits, "subs"=>$subs, "follows"=>$follows]);
    }

}
