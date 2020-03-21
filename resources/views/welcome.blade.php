{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
@if (Route::has('login'))
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
@endif
</body>
</html>
--}}

<!DOCTYPE HTML>
<html>
<head>
    <title>ٌWebsite Name</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="/Calm/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--  jquery plguin -->
    <script type="text/javascript" src="/Calm/js/jquery.min.js"></script>
    <!-- start gallery -->
    <script type="text/javascript" src="/Calm/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/Calm/js/jquery.mixitup.min.js"></script>
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
    <link href="/Calm/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <script src="/Calm/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
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
<body>
<!-- start header -->
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <h1><a href="index.html"><img src="images/logo.png" alt=""/></a></h1>
            </div>
            <div class="h_left">
                <ul class="menu">
                    <li class="active"><a href="index.html">صفحه اصلی</a></li>
                    <li><a href="about.html">درباره ما</a></li>
                    <li><a href="portfolio.html">نمونه کارها</a></li>
                    <li><a href="blog.html">وبلاگ</a></li>
                    <li><a href="contact.html">تماس با ما</a></li>
                </ul>
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="عبارت جستجوی خود را وارد کنید ..." type="text" value="" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"></span>
                    </form>
                </div>
                <script src="/Calm/js/classie.js"></script>
                <script src="/Calm/js/uisearch.js"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>
                <!-- start smart_nav * -->
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="index.html">صفحه اصلی</a></li>
                        <li class="nav-item"><a href="about.html">درباره ما</a></li>
                        <li class="nav-item"><a href="portfolio.html">نمونه کارها</a></li>
                        <li class="nav-item"><a href="blog.html">وبلاگ</a></li>
                        <li class="nav-item"><a href="contact.html">تماس با ما</a></li>
                        <div class="clear"></div>
                    </ul>
                </nav>
                <script type="text/javascript" src="/Calm/js/responsive.menu.js"></script>
                <!-- end smart_nav * -->
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_btm">
            <div class="h_right">
                <h2>وب سایت آرام خوش آمدید</h2>
                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3>
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
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start popup -->
            <div id="small-dialog" class="mfp-hide">
                <div class="pop_up">
                    <h2>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</h2>
                    <img src="/Calm/images/zoom.jpg" title="image-name">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    <a class="btn" href="details.html">ادامه مطلب</a>
                </div>
            </div>
            <!-- end popup -->
            <!-- start gallery  -->
            <div class="container">
                <ul id="filters" class="clearfix">
                    <li><span class="filter active" data-filter="app card icon logo web">همه</span></li> /
                    <li><span class="filter" data-filter="app card logo">طراحی</span></li> /
                    <li><span class="filter" data-filter="card app web icon">نام تجاری</span></li> /
                    <li><span class="filter" data-filter="icon web app">گرافیک</span></li> /
                    <li><span class="filter" data-filter="logo app">انیمیشن</span></li> /
                    <li><span class="filter" data-filter="web app card logo icon">تصویر</span></li> /
                    <li><span class="filter" data-filter="web app logo card">فتوگرافی</span></li>
                </ul>
                <div id="portfoliolist">
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio logo1" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic1.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">طبیعت</p>
                                        <span class="text-category">لوگو</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic2.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">ویژوال بیسیک</p>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic3.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">طراحی سونور</p>
                                        <span class="text-category">طراحی وب</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic4.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">شرکت تایپوگرافی</p>
                                        <span class="text-category">کارت کسب و کار</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic5.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">آب و هوا</p>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic6.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">BMF</p>
                                        <span class="text-category">کارت کسب و کار</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic7.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">

                                            لورم ایپسوم</p>
                                        <span class="text-category">کارت کسب و کار</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio logo1" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic8.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">طرح‌نما</p>
                                        <span class="text-category">لوگو</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="/Calm/images/pic9.jpg"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">نقشه برداری گراف</p>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div><!-- end container -->
        </div>
    </div>
</div>
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <div class="span_of_4">
                <div class="span1_of_4">
                    <h4>درباره ما</h4>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.....</p>
                    <span>آدرس</span>
                    <p class="top">
                        لورم ایپسوم یا طرح‌نما,</p>
                    <p>شریعتی-ملک-بن بست ایرانیاد,</p>
                    <p>ایران</p>
                    <p>تلفن:(00) 222 666 444</p>
                    <p>فکس: (000) 000 00 00 0</p>
                    <div class="f_icons">
                        <ul>
                            <li><a class="icon2" href="#"></a></li>
                            <li><a class="icon1" href="#"></a></li>
                            <li><a class="icon3" href="#"></a></li>
                            <li><a class="icon4" href="#"></a></li>
                            <li><a class="icon5" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span1_of_4">
                    <h4>آخرین پست ها</h4>
                    <span>لورم ایپسوم متن ساختگی</span>
                    <p>25 آوریل 2013</p>
                    <span>لورم ایپسوم متن ساختگی</span>
                    <p>25 آوریل 2013</p>
                    <span>لورم ایپسوم متن ساختگی</span>
                    <p>25 آوریل 2013</p>
                </div>
                <div class="span1_of_4">
                    <h4>آخرین نظرات</h4>
                    <span class="bg">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                    <span class="bg top">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                    <span class="bg">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                </div>
                <div class="span1_of_4">
                    <h4>

                        لورم ایپسوم یا طرح‌نما</h4>
                    <ul class="f_nav">
                        <li><a href="#"><img src="/Calm/images/f_pic1.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic2.jpg" alt=""> </a></li>
                        <li><a href="#"><img src=/Calm/"images/f_pic3.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic4.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic5.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic6.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic7.jpg" alt=""> </a></li>
                        <li><a href="#"><img src="/Calm/images/f_pic8.jpg" alt=""> </a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="footer_top">
                <div class="f_nav1">
                    <ul>
                        <li><a href="index.html">صفحه اصلی</a></li>
                        <li><a href="about.html">درباره ما</a></li>
                        <li><a href="portfolio.html">نمونه کارها</a></li>
                        <li><a href="blog.html">وبلاگ</a></li>
                        <li><a href="index.html">امکانات</a></li>
                        <li><a href="contact.html">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="copy">
                    <p class="link"><span>©کلیه حقوق مادی و معنوی برای مجموعه برنامه نویسان محفوظ می باشد<a href="https://barnamenevisan.org">مرجع تخصصی برنامه نویسان</a></span></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


{{--<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title>Gentelella Alela! | قالب مدیریت رایگان </title>

    <!-- Bootstrap -->
    <link href="/admintheme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admintheme/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admintheme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admintheme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/admintheme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/admintheme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/admintheme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admintheme/build/css/custom.min.css" rel="stylesheet">
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/admintheme/build/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2>مرتضی کریمی</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>عمومی</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> خانه <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">داشبورد</a></li>
                                    <li><a href="index2.html">داشبورد ۲</a></li>
                                    <li><a href="index3.html">داشبورد ۳</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> فرم <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">فرم عمومی</a></li>
                                    <li><a href="form_advanced.html">قطعات پیشرفته</a></li>
                                    <li><a href="form_validation.html">فرم اعتبار سنجی</a></li>
                                    <li><a href="form_wizards.html">فرم جادوگر</a></li>
                                    <li><a href="form_upload.html">فرم بارگذاری</a></li>
                                    <li><a href="form_buttons.html">فرم کلید ها</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> عناصر ظاهری <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="general_elements.html">عناصر عمومی</a></li>
                                    <li><a href="media_gallery.html">گالری چندرسانه ای</a></li>
                                    <li><a href="typography.html">تایپو گرافی</a></li>
                                    <li><a href="icons.html">آیکون ها</a></li>
                                    <li><a href="glyphicons.html">Glyphicons</a></li>
                                    <li><a href="widgets.html">ابزارک</a></li>
                                    <li><a href="invoice.html">صورت حساب</a></li>
                                    <li><a href="inbox.html">صندوق</a></li>
                                    <li><a href="calendar.html">تقویم</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> جداول <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tables.html">جداول</a></li>
                                    <li><a href="tables_dynamic.html">جدول پویا</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> ارائه داده <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="chartjs.html">Chart JS</a></li>
                                    <li><a href="chartjs2.html">Chart JS2</a></li>
                                    <li><a href="morisjs.html">Moris JS</a></li>
                                    <li><a href="echarts.html">ECharts</a></li>
                                    <li><a href="other_charts.html">چارت های دیگر</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>طرح بندی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="fixed_sidebar.html">نوار کناری ثابت</a></li>
                                    <li><a href="fixed_footer.html">پاورقی ثابت</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>به صورت زنده</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i> صفحات اضافی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">تجارت الکترونیک</a></li>
                                    <li><a href="projects.html">پروژه ها</a></li>
                                    <li><a href="project_detail.html">جزئیات پروژه</a></li>
                                    <li><a href="contacts.html">اطلاعات تماس</a></li>
                                    <li><a href="profile.html">نمایه</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-windows"></i> افزودنیهای پیشنهاد شده <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="page_403.html">403 ارور</a></li>
                                    <li><a href="page_404.html">404 ارور</a></li>
                                    <li><a href="page_500.html">500 ارور</a></li>
                                    <li><a href="plain_page.html">صفحه ساده</a></li>
                                    <li><a href="login.html">صفحه ورود</a></li>
                                    <li><a href="pricing_tables.html">جداول قیمت</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i> منو چند سطحی <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#level1_1">سطح یک</a>
                                    <li><a>سطح یک<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="level2.html">سطح دو</a>
                                            </li>
                                            <li><a href="#level2_1">سطح دو</a>
                                            </li>
                                            <li><a href="#level2_2">سطح دو</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#level1_2">سطح یک</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> صفحه مقصد <span
                                        class="label label-success pull-left">به زودی</span></a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="/admintheme/build/images/img.jpg" alt="">مرتضی کریمی
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> نمایه</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="/admintheme/build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="/admintheme/build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="/admintheme/build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="/admintheme/build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>مشاهده تمام اعلان ها</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>صفحه ساده</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="جست و جو برای...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">برو!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>صفحه ساده</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">تنظیمات 1</a>
                                            </li>
                                            <li><a href="#">تنظیمات 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                افزودن محتوا با این صفحه ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="hidden-print">
            <div class="pull-left">
                Gentelella - قالب پنل مدیریت بوت استرپ <a href="https://colorlib.com">Colorlib</a> | پارسی شده توسط <a
                    href="https://morteza-karimi.ir">مرتضی کریمی</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>
<!-- jQuery -->
<script src="/admintheme/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/admintheme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/admintheme/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/admintheme/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="/admintheme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/admintheme/vendors/iCheck/icheck.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="/admintheme/vendors/moment/min/moment.min.js"></script>

<script src="/admintheme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="/admintheme/build/js/custom.min.js"></script>


</body>
</html>--}}
