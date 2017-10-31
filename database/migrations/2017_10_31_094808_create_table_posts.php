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
           $table->string('name', 100);
           $table->text('description');
           $table->longText('text');
           $table->string('category');
           $table->string('user');
           $table->unsignedBigInteger('likes');
           $table->date('created_at');
           $table->date('modified_at');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
