<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Twit as Twit;
use App\Like as Like;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','login', 'location', 'link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function logo() {
        if (file_exists( public_path() . '/userdata/logo/' . $this->login . '.png')) {
            return '/userdata/logo/' . $this->login . '.png';
        } else {
            return '/images/defaultlogo.png';
        } 
    }

    public function bg() {
        if (file_exists( public_path() . '/userdata/bg/' . $this->login . '.png')) {
            return '/userdata/bg/' . $this->login . '.png';
        } else {
            return '/images/defaultbg.png';
        } 
    }

    public function getLikeCount() {
        return count(Like::where("user_id", $this->id)->get());
    }

    public function getLikeTwits() {
        return Like::where("user_id", $this->id)->get();
    }

    public function getTwits() {
       return Twit::where('user_id',$this->id)->get()->sortByDesc("created_at");
    }

    public function getFollows() {
       return Sub::where('user_id', $this->id)->get();
    }

    public function getSubs() {
        return Sub::where('follow_id', $this->id)->get();
    }
}
