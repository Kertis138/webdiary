<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like as Like;

class Twit extends Model
{
    protected $table = 'twits';

    protected $fillable = [
        'twit', 'user_id', 'likes','name'
    ];

    protected $likes = 0;
    protected $name = "Пусто";

    public function user() {
    	return $this->hasMany('App\User', 'id');
	}	

	public function likes() {
		return count(Like::where("twit_id",$this->id)->get());
	}

    public function hasLike($user) {
        if ($user == null)
            return false;
        return count(Like::where("twit_id",$this->id)->where("user_id",$user->id)->get()) == 1;
    }
}
