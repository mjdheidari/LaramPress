@extends('layouts.PagesTheme')
@section('tab-title')
    وبلاگ
@endsection

@section('style')

@endsection

@section('title')
    وبلاگ
@endsection

@section('content')

    @foreach($posts as $post)
        <div class="blog_main">
            <img width="50%" src="{{env('Post_img').$post->image}}" alt=""/>
            <div class="b_left">
                <h4>{{$post->title}}</h4>
                <div class="blog_list">
                    <ul>
                        <li><a> <i class="date"> </i><span>{{$post->created_at}}</span></a></li>

                        @php $cats = explode('%',$post->categories); @endphp

                        <li><a> <i class="views"> </i><span>{{$post->view}}</span></a></li>

                        <li><i class="text-category"> </i>
                            <span>
                                @foreach($cats as $cat)
                                    {{$cat}}&nbsp;
                                @endforeach
                            </span>
                            </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="blog_art">
                    <ul>
                        <li><a href="{{url('like')."/".$post->id}}"><i></i><span>{{$post->like}}</span></a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
            <p>{{$post->excerpt}}</p>
            <a class="btn" href="{{url('/blog')."/".$post->title}}">بیشتر بخوانید</a>
        </div>
        <br><br><br>
        {{--<ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>--}}

    @endforeach
    {{ $posts->links() }}

@endsection

