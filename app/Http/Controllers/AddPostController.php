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
        $picture_name=strip_tags(strtolower(trim($request->get('name'))));
        $picture_name=str_replace(' ', '-', $picture_name );
        $post = new Post(array(
            'name' => strip_tags($request->get('name')),
            'description' => strip_tags($request->get('description')),
            'text' => $request->get('text'),
            'picture' =>$picture_name . '.' . $request->file('image')->getClientOriginalExtension() ,
            'category_id'=>3,
            'user_id'=>Auth::id(),
            'likes'=>2
        ));
        $post->save();

        $request->file('image')->move(base_path() . '/public/images/' . $request->get('category'), $picture_name . '.' . $request->file('image')->getClientOriginalExtension() );

        return redirect()->route('indexController');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('indexController');
    }
}
