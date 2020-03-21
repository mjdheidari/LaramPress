@extends('layouts.PagesTheme')
@section('tab-title')
    {{$post->title}}
@endsection

@section('style')
    <style>
        input[type=text], input[type=email], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
@endsection

@section('title')
    {{$post->title}}
@endsection

@section('sub-title')

@endsection

@section('section-title')
    <ol class="breadcrumb">
        <li><a class="btn btn-round" href="{{url('/')}}"><i class="fa fa-dashboard"></i>خانه</a></li>

        @foreach(Request::segments() as $segment)
            <?php
            if ($segment == "blog") {
                $segment = 'بلاگ';
            }
            ?>
            <li>
                <a class="btn btn-round"
                   @if($segment=='بلاگ') href="{{ url('/blog') }}" @else
                   href="{{ url('/blog/'.$segment) }}" @endif>{{$segment}}</a>
            </li>
        @endforeach
    </ol><br>

@endsection

@section('content')
    <div class="det_pic">
        <img width="100%" src="{{env('Post_img').$post->image}}" alt=""/>
    </div>
    <div class="blog_list">
        <ul>
            <li><a href="{{url('author')."/".$post->author}}">نویسنده : {{$author}}</a></li>
            <li><a> <i class="date"> </i><span>{{$post->created_at}}</span></a></li>

            @php $cats = explode('%',$post->categories); @endphp

            <li><a> <i class="views"> </i><span>{{$post->view}}</span></a></li>

            <li><i class="text-category"> </i>
                @foreach($cats as $cat)
                    <a href="{{url('category')."/".$cat}}" style="display: inline-block">{{$cat}}</a>
                @endforeach
            </li>
        </ul>
        <div class="clear"></div>
    </div><br><br><br>
    <div class="det_text">
        <p>{!! $post->content !!}</p>
        {{--{!! $post->content !!}--}}
    </div>
    <div class="clear"></div>
    <hr>
    <ol>
        برچسب ها :
        @php $tags = explode('%',$post->tags); @endphp
        @if(!empty($post->tags))
            @foreach($tags as $tag)
                <a href="{{url('tag')."/".$tag}}">
                    <li class="btn btn-info"><i class="tag_nav"></i>{{$tag}}</li>
                </a>
            @endforeach
        @endif
    </ol>
@endsection

@section('comment')
    <br>
    <br>
    <br>
    <div class="container">
        <h3>دیدگاه خود را ثبت کنید.</h3>

        @if(Session::has('msg'))
            <div id="alert1" class="alert alert-success ">
                <button id="close" type="button" class="close"><span
                        aria-hidden="true">×</span>
                </button>
                {{ (string)Session::get('msg') }}
            </div>
        @endif

        <form action="{{route('comment' , $post->id)}}" method="post">
            @csrf
            <label for="fname">نام</label>
            <input type="text" required id="fname" name="name" placeholder="نام">

            <label for="lname">ایمیل</label>
            <input type="email" required id="lname" name="email" placeholder="ایمیل">

            <label for="subject">دیدگاه شما</label>
            <textarea id="subject" required name="comment" style="height:80px"></textarea>

            <input type="submit" value="ثبت نظر">
        </form>

        <br><br>
        <button class="btn btn-info" id="showcmnts">
            مشاهده نظرات کاربران
        </button>
        <div id="such"></div>
        <div hidden id="cmnts">
            <h3 id="cmntsttl"></h3><br>
            {{--@foreach($as as $comment)
            <div style="width: 85%; margin: auto">
                <div class="row">
                    <img id="man" width="50px" style="border-radius: 30%" src="/avatar/img.jpg" alt="">
                    <strong style="color: red;font-size: large;padding-right: 15px">{{$comment->name}}</strong>
                </div>

                <br>
                <p>{{$comment->comment}}</p>
            </div>
            @endforeach--}}
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#close").click(function () {
                $("#alert1").fadeOut(500);
            });
            $("#showcmnts").click(function () {
                $(this).hide();
                $("#cmntsttl").show();
                var Id = $(this).attr("id");
                $.ajax({
                    url: "{{ route("showcmnts" , $post->id) }}",
                    type: 'GET',
                    dataType: "json",
                    data: {"ide": Id},
                    success: function (data) {
                        if (data.length === 0) {
                            $("#cmntsttl").html('به عنوان اولین نفر، دیدگاه خود را ثبت کنید.');
                        } else {
                            $("#cmntsttl").html('نظرات کاربران');
                        }
                        /*document.write(JSON.stringify(data));*/
                        for (i = 0; i < data.length; i++) {
                            $('<div style="width: 85%; margin: auto"><div class="row"><img id="man" width="50px" style="border-radius: 30%" src="/avatar/img.jpg" alt=""><strong style="color: #34495e;font-size: large;padding-right: 15px">' + data[i].name + '</strong></div><br><p style="font-size: 18px">' + data[i].comment + '</p></div><br>')
                                .appendTo("#cmnts");
                        }
                        /*$.each(data, function () {
                            alert(data[0].name);

                        });*/

                        /*document.write(JSON.stringify(data));*/
                        /*$("#pop-title").html(data.title);
                        $("#pop-img").attr('src' , "/images/posts/" + data.image);
                        $("#pop-link").attr('href' , window.location.origin + "/blog/" + data.title);
                        $("#pop-excerpt").html(data.excerpt);*/
                    }
                });
                $("#cmnts").removeAttr('hidden');
            });
        });

        $(window).bind("load", function () {
            $.get("{{ url('view').'/'.$post->id }}");
        });
    </script>

@endsection
