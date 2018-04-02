<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twit extends Model
{
    protected $table = 'twits';

    public function user()
	{
    	return $this->hasMany('App\User', 'id');
	}	
}
