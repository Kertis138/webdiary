<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

}
