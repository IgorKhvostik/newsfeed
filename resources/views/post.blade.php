@extends('layouts.layout')
@section('content')

    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">
                        <ol class="breadcrumb">
                            <li><a href="{{route ('indexController')}}">HOME</a></li>
                            <li>
                                <a href="{{route ('categoryController',['categoryName'=>$category])}}">{{strtoupper($category)}}</a>
                            </li>
                        </ol>
                        <h1>{{$name}}</h1>
                        <div class="post_commentbox">
                            <a href="{{route ('userPostsController', ['userId'=>$user_id])}}"><i
                                        class="fa fa-user"></i>{{$userName}}</a>
                            <span><i class="fa fa-calendar"></i>{{$date}}</span> <a
                                    href="{{route ('categoryController',['categoryName'=>$category])}}"><i
                                        class="fa fa-tags"></i>{{$category}}</a></div>
                        <div class="single_page_content">
                            <img class="img-center" src="../../public/{{$picture}}" alt="">
                            <p>{{$text}}</p>
                        </div>
                        <div>
                            <i class="fa fa-heart-o fa-3x" aria-hidden="true" id="like"></i>
                            <span>{{$likes}}</span>
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
                                        <div class="media"><a class="media-left"
                                                              href="{{route ('postController',['categoryName'=> strtolower($post->category->name), 'id'=>$post->id])}}">
                                                <img src="../../public/images/{{$post->category->id}}/{{$post->picture}}"
                                                     alt=""> </a>
                                            <div class="media-body"><a class="catg_title"
                                                                       href="{{route ('postController',['categoryName'=> strtolower($post->category->name), 'id'=>$post->id])}}">{{$post->name}}</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="nav-slit">
                <a class="prev"
                   href="{{route ('postController',['categoryName'=> $prev->category->name, 'id'=>$prev->id])}}"> <span
                            class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                    <div>
                        <h3>{{$prev->name}}</h3>
                        <img src="../../public/images/{{$prev->category->id}}/{{$prev->picture}}" alt=""/></div>
                </a>
                <a class="next"
                   href="{{route ('postController',['categoryName'=> $next->category->name, 'id'=>$next->id])}}"> <span
                            class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                    <div>
                        <h3>{{$next->name}}</h3>
                        <img src="../../public/images/{{$next->category->id}}/{{$next->picture}}" alt=""/></div>
                </a>
            </nav>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>Popular Posts</span></h2>
                        <ul class="spost_nav">
                            @foreach($sortByLikes as $post)
                                <li>
                                    <div class="media wow fadeInDown">
                                        <a href="{{route ('postController',['categoryName'=> strtolower($post->category->name), 'id'=>$post->id])}}"
                                           class="media-left"><img alt=""
                                                                   src="../../public/images/{{$post->category->id}}/{{$post->picture}}">
                                        </a>
                                        <div class="media-body"><a
                                                    href="{{route ('postController',['categoryName'=> strtolower($post->category->name), 'id'=>$post->id])}}"
                                                    class="catg_title">{{$post->name}}</a></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <script>
        var postID = '{{$post->id}}';
        $("#like").click(function(){
            $.ajax({
                url: "/like",
                data: id=postID ,

                success: function(result){
                $("#like").html(result);
            }});
        });
    </script>
@endsection