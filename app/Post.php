<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['id', 'name', 'decription', 'text', 'category_id', 'user_id', 'likes'];


   public function user(){
       return $this->belongsTo('App\User');
   }

   public function category(){
       return $this->belongsTo('App\Category');
   }
}
