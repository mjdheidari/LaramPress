<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title>پنل کاربری</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    @yield('link')
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{env('PI').Auth::user()->image}}" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>عمومی</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{url('home')}}"><i class="fa fa-home"></i> خانه </a>
                            </li>
                            @if(Auth::user()->level == 'manager')
                            <li><a><i class="fa fa-desktop"></i> مدیریت سایت <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('managment.index')}}">لیست مدیران</a></li>
                                    <li><a href="{{route('managment.create')}}">افزودن مدیر</a></li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->level == 'manager' || Auth::user()->level == 'seller' || Auth::user()->level == 'admin')
                            <li><a><i class="fa fa-edit"></i> مدیریت محصولات <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('product.index')}}">محصولات (حذف / ویرایش)</a></li>
                                    <li><a href="{{route('product.create')}}">افزودن محصول</a></li>
                                    <li><a href="{{route('productscat.index')}}">دسته بندی محصولات</a></li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->level == 'manager' || Auth::user()->level == 'writer' || Auth::user()->level == 'admin')
                            <li><a><i class="fa fa-table"></i> مدیریت پست ها <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('posts.index')}}">نمایش پست ها</a></li>
                                    <li><a href="{{route('posts.create')}}">افزودن پست جدید</a></li>
                                    <li><a href="{{route('postcat.index')}}">دسته بندی پست ها</a></li>
                                </ul>
                            </li>
                            @endif


                            <li><a><i class="fa fa-comment"></i>نظرات کاربران<span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('comments.list')}}">مشاهده همه نظرات</a></li>
                                    <li><a href="{{route('comments.check')}}">نظرات بررسی نشده</a></li>
                                    <li><a href="{{route('comments.published')}}">نظرات منتشر شده</a></li>
                                    <li><a href="{{route('comments.trash')}}">زباله دان</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-file-code-o"></i>مدیریت برگه ها<span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('page.index')}}">ویرایش برگه ها</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" href="{{route('setting.index')}}" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog fa-spin" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>

                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="{{route('logout')}}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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
                                <img src="{{env('PI').Auth::user()->image}}" alt="">{{Auth::user()->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> نمایه</a></li>
                                <li>
                                    <a href="{{route('setting.index')}}">
                                        <i class="fa fa-cog pull-right fa-spin"></i>تنظیمات
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>
                                <li>
                                    <a href="{{route('logout')}}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>خروج
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                {{--<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>--}}
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
                                        <span class="image"><img src="../build/images/img.jpg"
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
                        <h3>@yield('page-title')</h3>
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
                @yield('content')
            </div>
        </div>
        @yield('footer')
        <footer class="hidden-print">
            <div class="pull-left">
                Gentelella - قالب پنل مدیریت بوت استرپ
            </div>
            <div class="clearfix"></div>
        </footer>
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
<script src="/admintheme/vendors/dropzone/dist/min/dropzone.min.js"></script>
@yield('table-script')
<!-- Custom Theme Scripts -->
<script src="/admintheme/build/js/custom.min.js"></script>


</body>
</html>
