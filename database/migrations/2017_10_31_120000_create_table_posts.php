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
       Schema::create('posts', function (Blueprint $table){
           $table->increments('id');

           $table->string('name', 100);
           $table->text('description');
           $table->longText('text');
           $table->unsignedInteger('category_id');
           $table->foreign('category_id')
                 ->references('id')
                 ->on('categories')
                 ->onDelete('cascade');
           $table->unsignedInteger('user_id');
           $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');
           $table->unsignedBigInteger('likes');
           $table->string('picture',100);
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

        Schema::drop('posts');
    }
}
