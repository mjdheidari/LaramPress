@extends('layouts.Theme')
@section('content')
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <!-- start popup -->
                <div id="small-dialog" class="mfp-hide">
                    <div class="pop_up">
                        <h2 id="pop-title"></h2>
                        <img id="pop-img" src="" title="">
                        <p id="pop-excerpt"></p>
                        <a class="btn" id="pop-link" href="">ادامه مطلب</a>
                    </div>
                </div>

                <!-- end popup -->
                <!-- start gallery  -->
                <div class="container">

                    {{--<ul id="filters" class="clearfix">
                        <li><span class="filter active" data-filter="app card icon logo web">همه</span></li>
                        /
                        <li><span class="filter" data-filter="app card logo">طراحی</span></li>
                        /
                        <li><span class="filter" data-filter="card app web icon">نام تجاری</span></li>
                        /
                        <li><span class="filter" data-filter="icon web app">گرافیک</span></li>
                        /
                        <li><span class="filter" data-filter="logo app">انیمیشن</span></li>
                        /
                        <li><span class="filter" data-filter="web app card logo icon">تصویر</span></li>
                        /
                        <li><span class="filter" data-filter="web app logo card">فتوگرافی</span></li>
                    </ul>--}}
                    <div id="portfoliolist">
                        @foreach($posts as $post)

                            <a class="popup-with-zoom-anim post-pop-up" id="{{$post->id}}" href="#small-dialog">
                                <div class="portfolio logo1" data-cat="logo">
                                    <div class="portfolio-wrapper">
                                        <img src="{{env('Post_img').$post->image}}" alt="Image 2"/>
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">{{$post->title}}</p>
                                                {{--<span class="text-category">لوگو</span>--}}
                                            </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- end container -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (e) {
            $(".post-pop-up").click(function (e) {
                var Id = $(this).attr("id");
                $.ajax({
                    url: "{{ route("postmin") }}",
                    type: 'GET',
                    dataType: "json",
                    data: {"ide": Id},
                    success: function (data) {
                        $("#pop-title").html(data.title);
                        $("#pop-img").attr('src' , "/images/posts/" + data.image);
                        $("#pop-link").attr('href' , window.location.origin + "/blog/" + data.title);
                        $("#pop-excerpt").html(data.excerpt);
                    }
                });
            });
        });
    </script>
@endsection

