<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); //Кто
            $table->unsignedInteger('twit_id'); //Какую статью
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
