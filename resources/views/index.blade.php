@extends('layouts.layout')
@section('content')



  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">

          @foreach($sortByLikes as $post)

            <div class="single_iteam"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}"> <img src="images/{{$post->cat_name}}/{{$post->picture}}" alt=""></a>
              <div class="slider_article">
                <h2><a class="slider_tittle" href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}">{{$post->name}}</a></h2>
                <p><a  href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}">{{$post->description}}</a></p>
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
                  <div class="media"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left"> <img alt="" src="images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                    <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
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
            <h2> <a href="{{route ('categoryController',['categoryName'=> strtolower($firstPostBusiness->cat_name)])}}"><span>{{strtoupper(strtolower($firstPostBusiness->cat_name))}}</span></a></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="{{route ('postController',['categoryName'=> strtolower($firstPostBusiness->cat_name), 'id'=>$firstPostBusiness->id])}}" class="featured_img"> <img alt="" src="images/{{$firstPostBusiness->cat_name}}/{{$firstPostBusiness->picture}}"> <span class="overlay"></span> </a>
                    <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> strtolower($firstPostBusiness->cat_name), 'id'=>$firstPostBusiness->id])}}">{{$firstPostBusiness->name}}</a> </figcaption>

                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach($otherPostBusiness as $post)
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left"> <img alt="" src="images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                    <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                  </div>
                </li>
                  @endforeach
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><a href="{{route ('categoryController',['categoryName'=> strtolower($firstPostFashion->cat_name)])}}"><span>{{strtoupper($firstPostFashion->cat_name)}}</span></a></h2>





                    <ul class="business_catgnav wow fadeInDown">
                        <li>
                          <figure class="bsbig_fig">
                            <a href="{{route ('postController',['categoryName'=> strtolower($firstPostFashion->cat_name), 'id'=>$firstPostFashion->id])}}" class="featured_img"> <img alt="" src="images/{{$firstPostFashion->cat_name}}/{{$firstPostFashion->picture}}"> <span class="overlay"></span> </a>
                            <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> strtolower($firstPostFashion->cat_name), 'id'=>$firstPostFashion->id])}}">{{$firstPostFashion->name}}</a> </figcaption>

                          </figure>
                        </li>
                    </ul>


                      @foreach($otherPostFashion as $post)
                      <ul class="spost_nav">
                        <li>
                          <div class="media wow fadeInDown">
                            <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left"> <img alt="" src="images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                            <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
                          </div>
                        </li>
                      </ul>
                    @endforeach

              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><a href="{{route ('categoryController',['categoryName'=> strtolower($firstPostSports->cat_name)])}}"><span>{{strtoupper($firstPostSports->cat_name)}}</span></a></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> strtolower($firstPostSports->cat_name), 'id'=>$firstPostSports->id])}}" class="featured_img">
                        <img alt="" src="images/{{$firstPostSports->cat_name}}/{{$firstPostSports->picture}}"> <span class="overlay"></span> </a>
                      <figcaption> <a class="catg_title" href="{{route ('postController',['categoryName'=> strtolower($firstPostSports->cat_name), 'id'=>$firstPostSports->id])}}">{{$firstPostSports->name}}</a> </figcaption>

                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @foreach($otherPostSports as $post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left">
                        <img alt="" src="images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                      <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
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
            <h2><span>Popular Posts</span></h2>
            <ul class="spost_nav">
              @foreach($sortByLikes as $post)
              <li>
                <div class="media wow fadeInDown"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="media-left"> <img alt="" src="images/{{$post->cat_name}}/{{$post->picture}}"> </a>
                  <div class="media-body"> <a href="{{route ('postController',['categoryName'=> strtolower($post->cat_name), 'id'=>$post->id])}}" class="catg_title">{{$post->name}}</a> </div>
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
