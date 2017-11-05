@extends('layouts.layout')
@section('content')
   <section id="contentSection">
       <div class="row">
           <ol class="breadcrumb">
               <li><a href="{{route ('indexController')}}">HOME</a></li>
               <li><a href="{{route ('userPostsController',['userId'=>$userId])}}">user: {{$userName}}</a></li>
           </ol>
            @foreach($posts as $postByCat)
               <div class="col-lg-4 col-md-4 col-sm-4">
                   <aside class="right_content">
                       <div class="single_sidebar">
                           <h2><a href="{{route ('categoryController',['categoryName'=> strtolower($postByCat->first()->cat_name)])}}"><span>{{$postByCat->first()->cat_name}}</span></a></h2>
                           <ul class="spost_nav">
                               @foreach($postByCat as $post)
                                   <li>
                                       <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left"> <img alt="" src="../images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                                           <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                                       </div>
                                   </li>
                               @endforeach
                           </ul>
                       </div>

                   </aside>
               </div>
           @endforeach
       </div>
   </section>

@endsection