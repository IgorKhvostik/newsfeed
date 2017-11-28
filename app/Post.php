<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['id', 'name', 'description', 'text', 'category_id', 'user_id', 'likes','picture'];


   public function user(){
       return $this->belongsTo('App\User');
   }

   public function category(){
       return $this->belongsTo('App\Category');
   }
}
