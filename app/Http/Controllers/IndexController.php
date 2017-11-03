<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
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
        $sortByLikes=$posts->sortByDesc('likes')->chunk(8)->first();

        //getting posts for "fashion" block
        $postsFashion=$posts->filter(function ($value){
            return $value->cat_name=='music';
        });
        $firstPostFashion=$postsFashion->first();
        $otherPostFashion=$postsFashion->splice(1,4);

        //getting posts for "sports" block
        $postsSports=$posts->filter(function ($value){
            return $value->cat_name=='it';
        });
        $firstPostSports=$postsSports->first();

        $otherPostSports=$postsSports->splice(1,4);
           // dd($otherPostSports);
        //getting posts for "business" block
        $postsBusiness=$posts->filter(function ($value){
            return $value->cat_name=='economics';
        });
        $firstPostBusiness=$postsBusiness->first();

        $otherPostBusiness=$postsBusiness->splice(1,4);

        $categoriesArr=Category::all()->toArray();
        foreach ($categoriesArr as $category){
            $catList[]=$category['cat_name'];
        }
        $dateTime=Carbon::now()->format('F j, Y h:i');
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
                                        'otherPostBusiness' => $otherPostBusiness,
                                        'catList'=>$catList,
                                        'dateTime'=>$dateTime
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
        //dd($posts[0]->cat_name);

        return view('post');


    }

    public function post($categoryName,$postId){


        //getting the collection of posts of category we need
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.cat_name', 'users.first_name','users.second_name')
            ->where('categories.cat_name', '=', $categoryName)
            ->orderBy('posts.id','desc')
            ->get();


        //getting the post we need by it's ID
        $post=$posts->where('id', '=', $postId)->first();


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
            ->select('posts.*', 'categories.cat_name', 'users.first_name')
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
                                    'userName'=>$post->first_name . ' ' . $post->second_name,
                                    'category'=>$post->cat_name,
                                    'text'=>$post->text,
                                    'picture'=>'../images'.'/'.$post->cat_name.'/'.$post->picture,
                                    'postsRelated'=>$postsRelated,
                                    'date'=>$post->created_at,
                                    'sortByLikes'=>$sortByLikes,
                                    'catList'=>$catList,
                                    'dateTime'=>$dateTime


        ]);
    }

    public function userPosts($userId){
        $posts=DB::table('posts')
            ->join('categories','posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id','posts.likes','posts.name','posts.description','posts.picture', 'categories.cat_name', 'users.first_name','users.second_name')
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

    }
}
