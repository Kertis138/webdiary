<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Twit as Twit;
use App\User as User;
use App\Sub as Sub;

class DiaryController extends Controller
{
	public function __construct()
    {
        //$this->middleware('guest');
    }

    public function make_auth() {
        $user = Auth::user();
        return $user;
    }

    public function print($data) {
        echo '<pre>' . var_export($data, true) . '</pre>';
    }


    public function mydiary() {
        $user = $this->make_auth();
        if ($user == null)
            return redirect()->route('login');
        return $this->diary($user->login);
    }


    public function diary($login)
    {
        $diary_user = User::where('login', $login)->first();
        if ($diary_user == null) {
           return abort(404);
        }


        $twits = Twit::where('user_id',$diary_user->id)->get()->sortByDesc("created_at");
        $follows = Sub::where('user_id', $diary_user->id)->get();
        $subs = Sub::where('follow_id', $diary_user->id)->get();
        

        return view('diary', ["twits"=>$twits, "diary_user"=>$diary_user, "follows"=>$follows, "subs"=>$subs]);
    }

    public function profile() {
        $user = Auth::user();
        if ($user === null) {
           return redirect()->route("login");
        }
        $twits = Twit::where('user_id',$user->id)->get()->sortByDesc("created_at");
        $follows = Sub::where('user_id', $user->id)->get();
        $subs = Sub::where('follow_id', $user->id)->get();
        return view('profile', ["diary_user"=>$user, "twits"=>$twits, "follows"=>$follows,"subs"=>$subs]);
    }

    public function profile_save_create(Request $request) {
        $user = Auth::user();
        if ($user === null) {
           return redirect()->route("login");
        }

        if ($request->hasFile('logofile') && !$request->file('logofile')->isValid())
            return back()->with('error','Ошибка при загрузке файла');

        if ($request->hasFile('bgfile') && !$request->file('bgfile')->isValid())
             return back()->with('error','Ошибка при загрузке файла');

        if ($request->hasFile('logofile'))
            $request->file('logofile')->storeAs('userdata/logo', $user->login.'.png');

        if ($request->hasFile('bgfile'))
            $request->file('bgfile')->storeAs('userdata/bg', $user->login.'.png');


        $user->location = $request->location;
        $user->name = $request->name;
        $user->link = $request->link;
        $user->update();

        return back()->with('success','Успешно');
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


}
