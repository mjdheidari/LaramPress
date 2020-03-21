<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
<!DOCTYPE HTML>
<html>
<head>
    <title>لارام پرس | LaramPress</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="/calm/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--  jquery plguin -->
    <script type="text/javascript" src="/calm/js/jquery.min.js"></script>
    <!-- start gallery -->
    <script type="text/javascript" src="/calm/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/calm/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {

                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                    );

                }

            };

            // Run the show!
            filterList.init();

        });
    </script>
    <!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
    <!-- Add fancyBox main JS and CSS files -->
    <link href="/calm/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <script src="/calm/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>

</head>
<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
<body>
<!-- start header -->
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <h1><a href="#"><img src="/calm/images/logo.png" alt=""/></a></h1>
            </div>
            <div class="h_left">
                <ul class="menu">
                    <li><a href="{{url('/about')}}">درباره ما</a></li>
                    <li><a href="">تماس با ما</a></li>
                    <li><a href="">فروشگاه</a></li>
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
                        <li class="nav-item"><a href="about.html">درباره ما</a></li>
                        <li class="nav-item"><a href="portfolio.html">تماس با ما</a></li>
                        <li class="nav-item"><a href="blog.html">فروشگاه</a></li>
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
        <div class="header_btm">
            <div class="h_right">
                <h2>سیستم مدیریت محتوا و فروشگاه لارام پرس</h2>
                <h3>مدیریت محصولات فروشگاهی به همراه وبلاگ کاملا رسپانسیو</h3>
            </div>
            <div class="soc_icons">
                <h2>ما را آنلاین پیدا کنید</h2>
                <ul>
                    <li><a class="icon1" href="#"></a></li>
                    <li><a class="icon2" href="#"></a></li>
                    <li><a class="icon3" href="#"></a></li>
                    <li><a class="icon4" href="#"></a></li>
                    <li><a class="icon5" href="#"></a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@yield('content')
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <div class="footer_top">
                <div class="f_nav1">
                    <ul>
                        <li><a href="{{url('/about')}}">درباره ما</a></li>
                        <li><a href="{{url('/contact')}}">تماس با ما</a></li>
                        <li><a href="{{url('/store')}}">فروشگاه</a></li>
                    </ul>
                </div>
                <div class="copy">
                    <p class="link"><span>توسعه داده شده توسط <a
                                href="https://MJDHEIDARI.IR">MJDHEIDARI.IR</a></span></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
