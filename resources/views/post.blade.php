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
                            <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>{{$category}}</a> </div>
                                <div class="single_page_content">
                                    <img class="" src="../images/2517-4.jpg" alt="">
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
                        <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                        <ul class="spost_nav wow fadeInDown animated">
                            <li>
                                <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img2.jpg" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                                </div>
                            </li>
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
                        <li>
                            <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="single_sidebar">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                        <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="category">
                            <ul>
                                <li class="cat-item"><a href="#">Sports</a></li>
                                <li class="cat-item"><a href="#">Fashion</a></li>
                                <li class="cat-item"><a href="#">Business</a></li>
                                <li class="cat-item"><a href="#">Technology</a></li>
                                <li class="cat-item"><a href="#">Games</a></li>
                                <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                                <li class="cat-item"><a href="#">Photography</a></li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="video">
                            <div class="vide_area">
                                <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Sponsor</span></h2>
                    <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Category Archive</span></h2>
                    <select class="catgArchive">
                        <option>Select Category</option>
                        <option>Life styles</option>
                        <option>Sports</option>
                        <option>Technology</option>
                        <option>Treads</option>
                    </select>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Links</span></h2>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Rss Feed</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Life &amp; Style</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
    @endsection