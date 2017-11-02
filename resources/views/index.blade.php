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

  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">

          @foreach($sortByLikes as $post)

            <div class="single_iteam"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}"> <img src="{{$post->picture}}" alt=""></a>
              <div class="slider_article">
                <h2><a class="slider_tittle" href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}">{{$post->name}}</a></h2>
                <p><a  href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}">{{$post->description}}</a></p>
              </div>
            </div>

            @endforeach
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">

          <div class="latest_post">
            <h2><span>Latest post</span></h2>
            <div class="latest_post_container">
              <div id="prev-button"><i class="fa fa-chevron-up"></i></div>

              <ul class="latest_postnav">
                @foreach($postLatest as $post)
                <li>
                  <div class="media"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left"> <img alt="" src="{{$post->picture}}"> </a>
                    <div class="media-body"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
              <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
            </div>
          </div>


      </div>
    </div>

  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2> <a href="{{route ('categoryController',['categoryName'=> $firstPostBusiness->cat_name])}}"><span>Business</span></a></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="{{route ('postController',['categoryName'=> $firstPostBusiness->cat_name, 'id'=>$firstPostBusiness->id])}}" class="featured_img"> <img alt="" src="{{$firstPostBusiness->picture}}"> <span class="overlay"></span> </a>
                    <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> $firstPostBusiness->cat_name, 'id'=>$firstPostBusiness->id])}}">{{$firstPostBusiness->name}}</a> </figcaption>
                    <p>{{$firstPostBusiness->description}}</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach($otherPostBusiness as $post)
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left"> <img alt="" src="{{$post->picture}}"> </a>
                    <div class="media-body"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                  </div>
                </li>
                  @endforeach
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><a href="{{route ('categoryController',['categoryName'=> $firstPostFashion->cat_name])}}"><span>Fashion</span></a></h2>





                    <ul class="business_catgnav wow fadeInDown">
                        <li>
                          <figure class="bsbig_fig">
                            <a href="{{route ('postController',['categoryName'=> $firstPostFashion->cat_name, 'id'=>$firstPostFashion->id])}}" class="featured_img"> <img alt="" src="{{$firstPostFashion->picture}}"> <span class="overlay"></span> </a>
                            <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> $firstPostFashion->cat_name, 'id'=>$firstPostFashion->id])}}">{{$firstPostFashion->name}}</a> </figcaption>
                            <p>{{$firstPostFashion->description}}</p>
                          </figure>
                        </li>
                    </ul>


                      @foreach($otherPostFashion as $post)
                      <ul class="spost_nav">
                        <li>
                          <div class="media wow fadeInDown">
                            <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left"> <img alt="" src="{{$post->picture}}"> </a>
                            <div class="media-body"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                          </div>
                        </li>
                      </ul>
                    @endforeach

              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><a href="{{route ('categoryController',['categoryName'=> $firstPostSports->cat_name])}}"><span>Sports</span></a></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> $firstPostSports->cat_name, 'id'=>$firstPostSports->id])}}" class="featured_img">
                        <img alt="" src="{{$firstPostSports->picture}}"> <span class="overlay"></span> </a>
                      <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> $firstPostSports->cat_name, 'id'=>$firstPostSports->id])}}">{{$firstPostSports->name}}</a> </figcaption>
                      <p>{{$firstPostSports->description}}</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @foreach($otherPostSports as $post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left">
                        <img alt="" src="{{$post->picture}}"> </a>
                      <div class="media-body"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                    </div>
                  </li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              @foreach($sortByLikes as $post)
              <li>
                <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> $post->cat_name, 'id'=>$post->id])}}" class="media-left"> <img alt="" src="{{$post->picture}}"> </a>
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

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/wow.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/slick.min.js')}}"></script>
  <script src="{{asset('js/jquery.li-scroller.1.0.js')}}"></script>
  <script src="{{asset('js/jquery.newsTicker.min.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
