<!DOCTYPE HTML>
<html>
<head>
    <title>Nhà sách Đà Nẵng</title>
    <!--css-->
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
    <!--css-->
    @yield('css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Nhà sách có quy mô vừa với nhiều thể loại sách phong phú trong và ngoai nước" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--search jQuery-->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <!--search jQuery-->
    <script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <!--mycart-->
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
    <!-- cart -->
    <script src="{{asset('frontend/js/simpleCart.min.js')}}"></script>
    <!-- cart -->
    <!--start-rate-->
    <script src="{{asset('frontend/js/jstarbox.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!--//End-rate-->
    @yield('scripts')
</head>
<body>
<!--header-->
<div class="header">
    @include('home.layouts.menu')

    <!--banner-->
    <div class="banner-w3">
        <div class="demo-1">
            <div id="example1" class="core-slider core-slider__carousel example_1">
                <div class="core-slider_viewport">
                    <div class="core-slider_list">
                        <div class="core-slider_item">
                            <img src="{{asset('frontend/images/b1.jpg')}}">
                        </div>
                        <div class="core-slider_item">
                            <img src="{{asset('frontend/images/b2.jpg')}}">
                        </div>
                        <div class="core-slider_item">
                            <img src="{{asset('frontend/images/b3.jpg')}}">
                        </div>
                        <div class="core-slider_item">
                            <img src="{{asset('frontend/images/b4.jpg')}}">
                        </div>
                    </div>
                </div>
                <div class="core-slider_nav">
                    <div class="core-slider_arrow core-slider_arrow__right"></div>
                    <div class="core-slider_arrow core-slider_arrow__left"></div>
                </div>
                <div class="core-slider_control-nav"></div>
            </div>
        </div>
        <link href="{{asset('frontend/css/coreSlider.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('frontend/js/coreSlider.js')}}"></script>
        <script>
            $('#example1').coreSlider({
                pauseOnHover: false,
                interval: 3000,
                controlNavEnabled: true
            });

        </script>

    </div>
    <!--banner-->
    <!--content-->
    <div class="content">
        <!--banner-bottom-->
        @yield('content')
        <!--new-arrivals-->
    </div>
    <!--content-->
    @include('home.layouts.footer')
    <!--copy-->
    <div class="copy-section">
        <div class="container">
            <div class="copy-left">
                <p>&copy; 2016 New Shop . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
            <div class="copy-right">
                <img src="{{asset('frontend/images/card.png')}}" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--copy-->
</div>
</body>
</html>