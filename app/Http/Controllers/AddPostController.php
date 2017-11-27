<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function addPost()
    {
        return view('addPost');
    }
}
