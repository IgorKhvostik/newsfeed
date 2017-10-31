<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users', function (Blueprint $table){
           $table->increments('id');
           $table->string('first_name');
           $table->string('second_name');
           $table->string('password');

       });
       Schema::create('posts', function (Blueprint $table){
           $table->increments('id');
           $table->foreign('user_id')
               ->references('id')
               ->on('users')
               ->onDelete('cascade');
           $table->string('name', 100);
           $table->text('description');
           $table->longText('text');
           $table->string('category');
           $table->unsignedInteger('user_id');
           $table->unsignedBigInteger('likes');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('posts');
    }
}
