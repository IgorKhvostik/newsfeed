<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['id', 'name', 'decription', 'text', 'category_id', 'user_id', 'likes'];
}
