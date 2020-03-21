<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('tab-title')</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="/calm/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap -->
    <link href="/admintheme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">

    <link href="/admintheme/build/css/custom.min.css" rel="stylesheet">
    <!--  jquery plguin -->
    <script type="text/javascript" src="/calm/js/jquery.min.js"></script>
    @yield('style')
</head>
<body>
<!-- start header -->
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <h1><a href="{{url('/')}}"><img src="/calm/images/logo.png" alt=""/></a></h1>
            </div>
            <div class="h_left">
                <ul class="menu">
                    <li><a href="{{url('about')}}">درباره ما</a></li>
                    <li><a href="{{url('contact')}}">تماس با ما</a></li>
                    <li><a href="{{url('store')}}">فروشگاه</a></li>
                    @if(Auth::user())
                        <li>
                            <a href="{{route('logout')}}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                خروج
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{route('register')}}">ایجاد حساب کاربری</a></li>
                        <li><a href="{{route('login')}}">ورود</a></li>
                    @endif
                </ul>
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="عبارت جستجوی خود را وارد کنید ..." type="text"
                               value="" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"></span>
                    </form>
                </div>
                <script src="/calm/js/classie.js"></script>
                <script src="/calm/js/uisearch.js"></script>
                <script>
                    new UISearch(document.getElementById('sb-search'));
                </script>
                <!-- start smart_nav * -->
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="{{url('about-us')}}">درباره ما</a></li>
                        <li class="nav-item"><a href="{{url('contact-us')}}">تماس با ما</a></li>
                        <li class="nav-item"><a href="{{url('store')}}">فروشگاه</a></li>
                        @if(Auth::user())
                            <li class="nav-item">
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    خروج
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li class="nav-item"><a href="{{route('register')}}">ایجاد حساب کاربری</a></li>
                            <li class="nav-item"><a href="{{route('login')}}">ورود</a></li>
                        @endif
                        <div class="nav-mobile"></div>
                    </ul>
                </nav>
                <script type="text/javascript" src="/calm/js/responsive.menu.js"></script>
                <!-- end smart_nav * -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start slider -->
<div class="slider_bg">
    <div class="wrap">
        <div class="slider">
            <h2>@yield('title')</h2>
            <h3>@yield('sub-title')</h3>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="content">
                <!-- start details -->
                <div class="details">
                    <h2>@yield('section-title')</h2>
                    @yield('content')
                </div>
                <!-- end details -->
            </div>
        </div>
    </div>
</div>
<div class="footer_bg">
    <div class="wrap">

        @yield('comment')


        <div class="clear"></div>

        <div class="footer">
            <div class="footer_top">
                <div class="f_nav1">
                    <ul>
                        <li><a href="{{url('about')}}">درباره ما</a></li>
                        <li><a href="{{url('contact')}}">تماس با ما</a></li>
                        <li><a href="{{url('store')}}">فروشگاه</a></li>
                    </ul>
                </div>
                <div class="copy">
                    <p class="link"><span>توسعه داده شده توسط <a target="_blank"
                                href="https://MJDHEIDARI.IR">MJDHEIDARI.IR</a></span></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
