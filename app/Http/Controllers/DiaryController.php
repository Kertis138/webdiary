<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Twit as Twit;

class DiaryController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function mydiary()
    {
        $twits = Twit::where('user_id',Auth::user()->id)->get();
        return view('layouts.mydiary', ["twits"=>$twits]);

    }
}
