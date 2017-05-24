<!DOCTYPE HTML>
<html>
<head>
    <title>Nhà sách Đà Nẵng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Nhà sách có quy mô vừa với nhiều thể loại sách phong phú trong và ngoai nước" />

    <meta content='NhaSachDaNang' property='og:site_name'/>
    <meta content='1747971682199772' property='fb:app_id'/>
    <meta content='article' property='og:type'/>
    @yield('meta')
    <!--css-->
    <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"> -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
    <link href="{{asset('frontend/css/coreSlider.css')}}" rel="stylesheet" type="text/css">
    <!--css-->
    @yield('css')

</head>
<body>
<!--header-->
<div class="header">
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1747971682199772";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    @include('home.layouts.menu')

    <!--banner-->
    <div class="banner-w3">
        <div class="demo-1">
            <div id="example1" class="core-slider core-slider__carousel example_1">
                <div class="core-slider_viewport">
                    <div class="core-slider_list">
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
                <p>&copy; 2017 Bookstore . All rights reserved </p>
            </div>
            <div class="copy-right">
                <img src="{{asset('frontend/images/card.png')}}" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--copy-->
</div>
<select class="form-control selectpicker" name="book_id"></select>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
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
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
<!-- select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- cart -->
<script src="{{asset('frontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
<!--start-rate-->
<script src="{{asset('frontend/js/jstarbox.js')}}"></script>

<script src="{{asset('frontend/js/coreSlider.js')}}"></script>
<script>
    $('#example1').coreSlider({
        pauseOnHover: false,
        interval: 3000,
        controlNavEnabled: true
    });

</script>

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
@yield('front-scripts')
<!-- <script type="text/javascript" src='http://demos.maxoffsky.com/shop-search/vendor/selectize/js/standalone/selectize.min.js'></script> -->
<script type="text/javascript" src="{{ asset('/js/selectize.min.js')}}"></script>
<script type="text/javascript" src='{{asset('js/homepage/main.js')}}'></script>
@yield('scripts')
</body>
</html>