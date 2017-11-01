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
            ->orderBy('posts.id','desc')
            ->get();

        //getting posts for "latest post" block
        $postLatest=$posts->chunk(5)->first();

        //getting posts for "slick_slider" block
        $sortByLikes=$posts->sortByDesc('likes')->chunk(4)->first();

        //getting posts for "fashion" block
        $postsFashion=$posts->filter(function ($value){
            return $value->cat_name=='fashion';
        });
        $firstPostFashion=$postsFashion->first();
        $otherPostFashion=$postsFashion->splice(1,4);

        //getting posts for "sports" block
        $postsSports=$posts->filter(function ($value){
            return $value->cat_name=='sports';
        });
        $firstPostSports=$postsSports->first();
        $otherPostSports=$postsSports->splice(1,4);

        //getting posts for "business" block
        $postsBusiness=$posts->filter(function ($value){
            return $value->cat_name=='business';
        });
        $firstPostBusiness=$postsBusiness->first();
        $otherPostBusiness=$postsBusiness->splice(1,4);

        //dd($otherPostFashion);
        //dd($postLatest);


            return view('index')->with(['posts'=> $posts,
                                        'postLatest'=>$postLatest,
                                        'sortByLikes'=>$sortByLikes,
                                        'firstPostFashion'=>$firstPostFashion,
                                        'otherPostFashion'=>$otherPostFashion,
                                        'firstPostSports'=> $firstPostSports,
                                        'otherPostSports' => $otherPostSports,
                                        'firstPostBusiness' => $firstPostBusiness,
                                        'otherPostBusiness' => $otherPostBusiness
                                         ]);
    }

    public function category($categoryName){
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.first_name')
            ->where('categories.cat_name', '=', $categoryName)
            ->orderBy('posts.id','desc')
            ->get();
        //dd($posts);

        return view('post');


    }

    public function post($categoryName,$postId){
        $post=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.first_name')
            ->where('posts.id', '=', $postId)
            ->orderBy('posts.id','desc')
            ->get()->first();
        //dd($post->picture);

        return view('post')->with(['name'=>$post->name,
                                    'category'=>$post->cat_name,
                                    'text'=>$post->text,
                                    'picture'=>$post->picture


        ]);
    }
}
