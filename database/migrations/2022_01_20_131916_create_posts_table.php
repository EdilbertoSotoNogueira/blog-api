<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
                      
            $table->id();
            $table->string('title');
            $table->string('post_body');
            $table->unsignedBigInteger('users_id');

            $table->timestamps();


            $table->foreign('users_id')->references('id')->on('users');

        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
