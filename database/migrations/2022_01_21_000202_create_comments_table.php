<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comments');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('posts_id');

            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('posts_id')->references('id')->on('posts');

        });
    }


    public function down()
    {
        Schema::dropIfExists('comments');
    }

    
}
