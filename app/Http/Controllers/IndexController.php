<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class IndexController extends Controller
{
    public function index(){
        $posts=Post::with(['category:name,id','user:name,id'])->orderBy('posts.id', 'desc')->get();
       // dd($posts);

        //get the list of categories
        $categoriesArr=Category::select('name')->get()->toArray();
        foreach ($categoriesArr as $category){
            $catList[]=$category['name'];
        }
        //dd($catList);

        //sorting posts by categories
        foreach ($catList as $cat){
            static $i=0;
            foreach ( $posts as $post){
                //we compare if category of post is equal to category in the catList on each iteration. If it's equal then we put it into array
                if ($post->category->name==$cat){
                    $postGroup[$i][]=$post;
                }
            }

            //get only 4 posts to display

            $postGroup[$i]=array_slice($postGroup[$i], 0,4);
            //dd($postGroup);
            //divide posts to first post(displayed as big) and other posts(displayed as small) on the page
            foreach ($postGroup as $post){
                $post=array_reverse($post);
                $firstPostGroup[$i]=array_splice($post, count($post)-1);
                $postGroup[$i]=array_splice($post, 0);
            }
            $postGroup[$i]=array_reverse($postGroup[$i]);
            $i++;
        }
        //dd($postGroup);
       //dd($firstPostGroup);


        //getting posts for "latest post" block
        $postLatest=$posts->chunk(5)->first();

        //getting posts for "slick_slider" block
        $sortByLikes=$posts->sortByDesc('likes')->chunk(8)->first();

        $dateTime=Carbon::now()->format('F j, Y h:i');
        //dd($otherPostFashion);
        //dd($postLatest);


            return view('index')->with(['posts'=> $posts,
                                        'postLatest'=>$postLatest,
                                        'sortByLikes'=>$sortByLikes,
                                        'catList'=>$catList,
                                        'dateTime'=>$dateTime,
                                        'postGroup'=>$postGroup,
                                        'firstPostGroup'=>$firstPostGroup
                                         ]);
    }

   /* public function category($categoryName){
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.userName')
            ->where('categories.cat_name', '=', $categoryName)
            ->orderBy('posts.id','desc')
            ->paginate(10);
        //dd($posts);
        $dateTime=Carbon::now()->format('F j, Y h:i');
        $categoriesArr=Category::all()->toArray();
        foreach ($categoriesArr as $category){
            $catList[]=$category['cat_name'];
        }

        return view('category')->with([
                                    'category'=>$categoryName,
                                    'posts'=>$posts,
                                    'name'=>$posts->first()->name,
                                     'dateTime'=>$dateTime,
                                    'catList'=>$catList

        ]);


    }

    public function post($categoryName,$postId){


        //getting the collection of posts of category we need
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'userName')
            ->where('categories.cat_name', '=', $categoryName)
            ->orderBy('id', 'desc')
            ->get();


        //getting the post we need by it's ID
        $post=$posts->where('id', '=', $postId)->first();

        //getting the previous and the next post of the category
        if ( is_null($postPrev=$posts->where('id', '=', $postId-1)->first())){
            $postPrev=$posts->first();
        }

        if (is_null($postNext=$posts->where('id', '=', $postId+1)->first())){
            $postNext=$posts->last();
        }



        //exclude the post we needed to get the collection without it. It's necessary for block with related posts
        $postsRelated=$posts->where('cat_name', '=', $categoryName);
        foreach ($postsRelated as $key=>$value){
            if ($value->id==$post->id){
                $postsRelated->forget($key);
            }
        }
        $postsRelated=$postsRelated->shuffle()->slice(0,6);
       // dd($postsRelated);


        //getting the collection of posts with the biggest number of likes for block with popular posts
        $sortByLikes=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.userName')
            ->orderBy('likes', 'desc')
            ->limit(9)
            ->get();
       // $categoriesList=$posts->first()->only('cat_name');
        //$sortByLikes=$sortByLikes->where('cat_name', '=', $categoryName);
        foreach ($sortByLikes as $key=>$value) {
            if ($value->id == $post->id) {
                $sortByLikes->forget($key);
            }
        }
        $categoriesArr=Category::all()->toArray();
        foreach ($categoriesArr as $category){
            $catList[]=$category['cat_name'];
        }
        $dateTime=Carbon::now()->format('F j, Y h:i');


        //dd('images'.'/'.$post->cat_name.'/'.$post->picture);
        return view('post')->with(['name'=>$post->name,
                                    'user_id'=>$post->user_id,
                                    'userName'=>$post->userName,
                                    'category'=>$post->cat_name,
                                    'text'=>$post->text,
                                    'picture'=>'../images'.'/'.$post->cat_name.'/'.$post->picture,
                                    'postsRelated'=>$postsRelated,
                                    'date'=>$post->created_at,
                                    'sortByLikes'=>$sortByLikes,
                                    'catList'=>$catList,
                                    'dateTime'=>$dateTime,
                                    'prev'=>$postPrev,
                                    'next'=>$postNext


        ]);
    }

    public function userPosts($userId){
        $dateTime=Carbon::now()->format('F j, Y h:i');
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id','posts.likes','posts.name','posts.description','posts.picture', 'categories.cat_name', 'users.userName')
            ->where('user_id', '=', $userId)
            ->orderBy('likes', 'desc')
            ->get();
        //dd($posts);
        $categories=array();
        foreach ($posts as $post){

            if (!in_array($post->cat_name, $categories)){
                $categories[]=$post->cat_name;
            }
        }
        for ($i=0;$i<count($categories);$i++){
            $cat=$categories[$i];
            $postsByCategories[$i]=$posts->where('cat_name', '=', $cat);
        }
        $userName=strtoupper($posts->first()->userName);
       // dd($postsByCategories);
        return view('user')->with([
                                    'posts'=>$postsByCategories,
                                    'catList'=>$categories,
                                    'dateTime'=>$dateTime,
                                    'userId'=>$userId,
                                    'userName'=>$userName
        ]);

    }*/
}
