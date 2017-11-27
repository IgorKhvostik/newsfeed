<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $categories=Category::select('name', 'id')->get();
        $catList=array();
        foreach ($categories as $cat){
            $catList[$cat->id]=$cat->name;
        }
        //dd($catList);
        return view('addPost')->with([
            'catList'=>$catList,
            'dateTime'=>$dateTime,

        ]);
    }
    public function savePost(Request $request)
    {
        dd($request->all());

        $this->userId=Auth::id();
       // return view('welcome');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('indexController');
    }
}
