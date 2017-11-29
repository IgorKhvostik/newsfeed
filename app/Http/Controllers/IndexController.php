<?php

namespace App\Http\Controllers;

use App\Category;
use App\Like;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class IndexController extends Controller
{
    protected $userId;
    protected $categoryName;
    public $catList;

    public function index()
    {
        $posts = Post::with(['category:name,id', 'user:name,id'])->orderBy('posts.id', 'desc')->get();


        //get the list of categories
        $categoriesArr = Category::select('name')->get()->toArray();

        foreach ($categoriesArr as $category) {
           $catList[] = $category['name'];
        }


        //sorting posts by categories
        foreach ($catList as $cat) {
            static $i = 0;
            foreach ($posts as $post) {
                //we compare if category of post is equal to category in the catList on each iteration. If it's equal then we put it into array
                if ($post->category->name == $cat) {
                    $postGroup[$i][] = $post;
                }
            }
            //get only 4 posts to display
            $postGroup[$i] = array_slice($postGroup[$i], 0, 4);
            //divide posts to first post(displayed as big) and other posts(displayed as small) on the page
            foreach ($postGroup as $post) {
                $post = array_reverse($post);
                $firstPostGroup[$i] = array_splice($post, count($post) - 1);
                $postGroup[$i] = array_splice($post, 0);
            }
            $postGroup[$i] = array_reverse($postGroup[$i]);
            $i++;
        }

        //getting posts for "latest post" block
        $postLatest = $posts->chunk(5)->first();

        //getting posts for "slick_slider" block
        $sortByLikes = $posts->sortByDesc('likes')->chunk(8)->first();

        $dateTime = Carbon::now()->format('F j, Y h:i');

        return view('index')->with([
            'posts' => $posts,
            'postLatest' => $postLatest,
            'sortByLikes' => $sortByLikes,
            'catList' => $catList,
            'dateTime' => $dateTime,
            'postGroup' => $postGroup,
            'firstPostGroup' => $firstPostGroup,
        ]);
    }

    public function category($categoryName)
    {
        $this->categoryName = $categoryName;
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', '=', $this->categoryName);
        })
            ->with('category:name,id')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dateTime = Carbon::now()->format('F j, Y h:i');
        $categoriesArr = Category::all()->toArray();
        foreach ($categoriesArr as $category) {
            $catList[] = $category['name'];
        }

        return view('category')->with([
            'category' => $categoryName,
            'posts' => $posts,
            'name' => $posts->first()->name,
            'dateTime' => $dateTime,
            'catList' => $catList
        ]);
    }

    public function post($categoryName, $postId)
    {
        $this->categoryName = $categoryName;

        //getting the collection of posts of chosen category
        $posts = Post::with(['category:name,id', 'user:name,id'])->get();


        //getting the post we need by it's ID
        $post = $posts->where('id', $postId)->first();
        $likes=Like::where('post_id',$post->id)->count();

        $postsByCategory = $posts->where('category.name', $categoryName);

        //getting the previous and the next post of the category
        if (is_null($postPrev = $postsByCategory->where('id', $postId - 1)->first())) {
            $postPrev = $postsByCategory->last();
        }

        if (is_null($postNext = $postsByCategory->where('id', $postId + 1)->first())) {
            $postNext = $postsByCategory->first();
        }

        //exclude the post we needed to get the collection without it. It's necessary for block with related posts
        $postsRelated = $postsByCategory->except($postId);
        $postsRelated = $postsRelated->shuffle()->slice(0, 6);


        //getting the collection of posts with the biggest number of likes for block with popular posts
        $sortByLikes = $posts->except($postId)->sortByDesc('likes');

        $categories = array();
        foreach ($posts as $each) {
            if (!in_array($each->category->name, $categories)) {
                $categories[] = $each->category->name;
            }
        }
        //dd($post->id);

        $dateTime = Carbon::now()->format('F j, Y h:i');

        return view('post')->with([
            'name' => $post->name,
            'user_id' => $post->user_id,
            'userName' => $post->user->name,
            'category' => $post->category->name,
            'text' => $post->text,
            'picture' => '../images' . '/' . $post->category->id . '/' . $post->picture,
            'postsRelated' => $postsRelated,
            'date' => $post->created_at,
            'sortByLikes' => $sortByLikes,
            'catList' => $categories,
            'dateTime' => $dateTime,
            'prev' => $postPrev,
            'next' => $postNext,
            'likes'=>$likes,
            'id' => $post->id


        ]);
    }

    public function userPosts($userId)
    {
        $this->userId = $userId;
        $dateTime = Carbon::now()->format('F j, Y h:i');
        $posts = Post::with(['category:name,id', 'user:name,id'])->whereHas('user', function ($query) {
            $query->where('id', $this->userId);
        })->get();

        $categories = array();
        foreach ($posts as $post) {
            if (!in_array($post->category->name, $categories)) {
                $categories[] = $post->category->name;
            }
        }

        $postsByCategories = array();
        for ($i = 0; $i < count($categories); $i++) {
            $this->categoryName = $categories[$i];
            $postsByCategories[$this->categoryName] = $posts->where('category.name', $this->categoryName);
        }

        $userName = strtoupper($posts->first()->user->name);

        return view('user')->with([
            'posts' => $postsByCategories,
            'catList' => $categories,
            'dateTime' => $dateTime,
            'userId' => $userId,
            'userName' => $userName
        ]);

    }


}
