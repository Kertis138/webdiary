<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $table = 'subs';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'follow_id'
    ];	

}
