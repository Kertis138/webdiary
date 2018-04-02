<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwittable extends Migration
{
    public function up()
    {
            Schema::create('twits', function (Blueprint $table) {
              $table->increments('id');
              $table->unsignedInteger('user_id');
              $table->foreign('user_id')->references('id')->on('users');
              $table->string('name');
              $table->timestamps();
              $table->text('twit');
              $table->unsignedInteger('likes');
         });
    }

    public function down()
    {
        Schema::dropIfExists('twits');
    }
}
