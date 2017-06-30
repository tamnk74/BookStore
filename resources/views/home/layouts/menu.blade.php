<div class="header-top">
    <div class="container">
        <div class="top-left">
            <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
        </div>
        <div class="top-right">

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="heder-bottom">
    <div class="container">
        <div class="logo-nav">
            <div class="logo-nav-left">
                <h1><a href="{{ route('homepage') }}">@lang('layouts.app_title')</a></h1>
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
                            <li  class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('homepage') }}" class="act">@lang('layouts.app_home')</a></li>
                            <!-- Mega Menu -->
                            <li  class="{{ Request::is('list-books') ? 'active' : '' }}">
                                <a href="{{ route('list-books') }}">@lang('layouts.books')</a>
                            </li>
                            <li  class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">@lang('layouts.contact')</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            {!! Form::open(['route' => 'list-books', 'method' => 'GET', 'class' => 'form-inline'])!!}
            <div class="logo-nav-right" style="width: 435px; float: left; display: inline-block; margin-top: 12px">
                <input type="text" id="searchbox" name="q" placeholder="Tìm sách hay thể loại..." max="50" value="">
                <button class="btn btn-default" type="submit" style="float: left; height: 50px; width: 50px"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            {{ Form::close()}}
        </div>
    </div>
</div>
<!--header-->