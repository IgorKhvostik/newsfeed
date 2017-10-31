<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/li-scroller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <p>Friday, December 05, 2045</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area"><a href="#" class="logo"><img src="{{asset('images/logo.jpg')}}" alt=""></a></div>
                    </div>
                </div>
            </div>
        </header>

        @yield('navArea')
        @yield('newsLine')
        @yield('all')

<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInLeftBig">
                    <h2>Flickr Images</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInDown">
                    <h2>Tag</h2>
                    <ul class="tag_nav">
                        <li><a href="#">Games</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Life &amp; Style</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Photo</a></li>
                        <li><a href="#">Slider</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <address>
                        Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <p class="copyright">Copyright &copy; 2017 <a href="#">NewsFeed</a></p>
        <p class="developer">Developed By Wpfreeware</p>
    </div>
</footer>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.li-scroller.1.0.js')}}"></script>
<script src="{{asset('js/jquery.newsTicker.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>