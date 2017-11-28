@extends('layouts.layout')
@section('content')
    <section id="contentSection">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route ('indexController')}}">HOME</a></li>
                <li><a href="{{route ('categoryController',['categoryName'=>$category])}}">category: {{$category}}</a>
                </li>
            </ol>
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2>
                        <a href="{{route ('categoryController',['categoryName'=> strtolower($category)])}}"><span>{{$category}}</span></a>
                    </h2>
                    <ul class="spost_nav">
                        @foreach($posts as $post)
                            <li>
                                <div class="media wow fadeInDown"><a
                                            href="{{route ('postController',['categoryName'=> strtolower($post->category->name), 'id'=>$post->id])}}"
                                            class="media-left"> <img alt=""
                                                                     src="../images/{{$post->category->id}}/{{$post->picture}}">
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
    </section>
    {{ $posts->links() }}
@endsection