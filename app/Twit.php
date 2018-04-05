<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
