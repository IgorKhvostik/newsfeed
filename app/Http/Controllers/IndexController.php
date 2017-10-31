<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.first_name')
            ->get();

        return view('index')->with('posts', $posts);
    }

}