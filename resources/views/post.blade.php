@extends('layouts.layout')
@section('content')
<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav main_nav">
                <li class="active"><a href="#"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                <li><a href="#">Technology</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Android</a></li>
                        <li><a href="#">Samsung</a></li>
                        <li><a href="#">Nokia</a></li>
                        <li><a href="#">Walton Mobile</a></li>
                        <li><a href="#">Sympony</a></li>
                    </ul>
                </li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Tablets</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">404 Page</a></li>
            </ul>
        </div>
    </nav>
</section>

<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <ol class="breadcrumb">
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="#">Technology</a></li>
                        <li class="active">Mobile</li>
                    </ol>
                    <h1>{{$name}}</h1>
                    <div class="post_commentbox">
                        <a href="#"><i class="fa fa-user"></i>Wpfreeware</a>
                            <span><i class="fa fa-calendar"></i>{{$date}}</span> <a href="#"><i class="fa fa-tags"></i>{{$category}}</a> </div>
                                <div class="single_page_content">
                                    <img class="img-center" src="../../public/{{$picture}}" alt="">
                                    <p>{{$text}}</p>

                    </div>
                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="related_post">
                        <h2>Related Post</h2>
                        <ul class="spost_nav wow fadeInDown animated">
                            @foreach($postsRelated as $post)
                            <li>
                                <div class="media"> <a class="media-left" href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}"> <img src="../../public/{{$post->picture}}" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}">{{$post->name}}</a> </div>
                                </div>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                <div>
                    <h3>City Lights</h3>
                    <img src="../images/post_img1.jpg" alt=""/> </div>
            </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                <div>
                    <h3>Street Hills</h3>
                    <img src="../images/post_img1.jpg" alt=""/> </div>
            </a> </nav>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Popular Post</span></h2>
                    <ul class="spost_nav">
                        @foreach($sortByLikes as $post)
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left"><img alt="" src="../../public/{{$post->picture}}"> </a>
                                <div class="media-body"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
    @endsection