<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Middleware\RenamePicture;
use Symfony\Component\HttpFoundation\Session\Storage;

class AddPostController extends Controller
{
    protected $userId;

    public function __construct()
    {
        $this->middleware('auth');


    }

    public function addPost()
    {
        $dateTime = Carbon::now()->format('F j, Y h:i');
        $categories = Category::select('name', 'id')->get();
        $catList = array();
        foreach ($categories as $cat) {
            $catList[$cat->id] = $cat->name;
        }
        //dd($catList);
        return view('addPost')->with([
            'catList' => $catList,
            'dateTime' => $dateTime,

        ]);
    }

    public function savePost(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:posts| max:100',
            'description' => 'required|unique:posts| max:300',
            'text' => 'required|unique:posts',
            'image' => 'file|required'
        ]);
        $picture_name = strip_tags(strtolower(trim($request->get('name'))));
        $picture_name = str_replace(' ', '-', $picture_name);

        $post = new Post(array(
            'name' => strip_tags(strtolower(trim($request->get('name')))),
            'description' => strip_tags(strtolower(trim($request->get('description')))),
            'text' => $request->get('text'),
            'picture' => $picture_name . '.' . $request->file('image')->getClientOriginalExtension(),
            'category_id' => $request->get('category'),
            'user_id' => Auth::id(),
        ));
        $post->save();

        $request->file('image')->move(base_path() . '/public/images/' . $request->get('category'), $picture_name . '.' . $request->file('image')->getClientOriginalExtension());

        return redirect()->route('indexController');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('indexController');
    }
    public function like(Request $request){
        $post=Post::find($request->id);
       $post->likes=$post->likes+1;
       $post->save();
       return"$post->likes";
    }
}
