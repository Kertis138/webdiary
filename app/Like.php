<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Twit as Twit;

class Like extends Model
{
    protected $fillable = [
     'user_id', 'twit_id'
    ];
    public $timestamps = false;

    public function getTwit() {
    	return Twit::where("id", $this->twit_id)->first();
    }
}
