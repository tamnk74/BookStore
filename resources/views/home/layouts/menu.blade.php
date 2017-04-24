<div class="header-top">
    <div class="container">
        <div class="top-left">
            <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
        </div>
        <div class="top-right">
            //right menu
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="heder-bottom">
    <div class="container">
        <div class="logo-nav">
            <div class="logo-nav-left">
                <h1><a href="{{ route('homepage') }}">Nhà sách Đà Nẵng <span>chi nhánh 1</span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li  class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('homepage') }}" class="act">Home</a></li>
                            <!-- Mega Menu -->
                            <li  class="{{ Request::is('book') ? 'active' : '' }}">
                                <a href="{{ route('book') }}">Books</a>
                            </li>
                            <li  class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">About us</a></li>
                            <li  class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">
                <ul class="cd-header-buttons">
                    <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                </ul> <!-- cd-header-buttons -->
                <div id="cd-search" class="cd-search">
                {!! Form::open(['route' => 'book', 'method' => 'GET'])!!}
                    <select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
                 {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--header-->