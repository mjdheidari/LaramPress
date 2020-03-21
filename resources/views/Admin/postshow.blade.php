@extends('layouts.admin')
@section('page-title')
    صفحه پست
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$post->title}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div>
                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class=" product-image">
                                <img class="center-block" src="{{env('Post_img').$post->image}}"
                                     alt=""/>
                            </div>
                        </div>
                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <h3>متن پست</h3>
                            <hr>
                            <p>{!! $post->content !!}</p>
                        </div>
                        <br><br>
                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <h3>چکیده پست</h3>
                            <hr>
                            <p>{{$post->excerpt}}</p>
                        </div>
                        <br><br>
                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <h5>دسته بندی های انتخاب شده برای این پست</h5>
                            @if(empty($post->categories))
                                <ul class="list-inline prod_size">
                                    <li>
                                        <a class="btn-info btn-round btn-sm btn">دسته بندی نشده</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-inline prod_size">
                                    @php $cats = explode("%" , $post->categories); @endphp
                                    @foreach($cats as $cat)
                                        <li>
                                            <a class="btn-info btn-round btn-sm btn">{{$cat}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class=" col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <h5>برچسب های این پست</h5>
                            @if(empty($post->tags))
                                <ul class="list-inline prod_size">
                                    <li>
                                        <a class="btn-info btn-round btn-sm btn">بدون برچسب</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-inline prod_size">
                                    @php $tags = explode("," , $post->tags); @endphp
                                    @foreach($tags as $tag)
                                        <li>
                                            <a class="btn-dark btn-round btn-sm btn">{{$tag}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>


                        <div class="left row">
                            <form style="display: inline-block" action="{{route('posts.destroy',$post->id)}}"
                                  method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-lg">حذف پست</button>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-lg">ویرایش پست</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
