@extends('layouts.admin')
@section('page-title')
    ویرایش پست
@endsection
@section('content')
    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>اطلاعات پست جدید</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf @method("PUT")
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">عنوان پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input required name="title" type="text" class="form-control" value="{{$post->title}}" placeholder="عنوان پست">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">انتخاب دسته بندی</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            دسته های انتخاب شده برای این محصول:
                            <div id="cati">@php $categories = explode("%" , $post->categories); @endphp
                                @foreach($categories as $category)
                                    {{$category}} -
                                @endforeach
                            </div>
                            <select id="selection" name="cat[]" class="select2_multiple form-control" multiple="multiple">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->title}}">{{$cat->title}} </option>
                                @endforeach
                            </select>
                            <p>با نگه داشتن دکمه Ctrl میتوانید چند دسته را انتخاب کنید. <a
                                    href="{{route('postcat.index')}}" style="color: #BA2121">
                                    افزودن دسته جدید
                                </a></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ورودی برچسب های پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input required name="tag[]" value="{{$post->tags}}" id="tags_1" type="text" class="tags form-control"/>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تصویر شاخص</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="image" type='file' onchange="readURL(this);" /><br>
                            <img id="blah"  src="{{env('Post_img').$post->image}}" width="100%">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">محتوای پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea required class="form-control" id="summary-ckeditor" name="content">{{$post->content}}</textarea>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">چکیده پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea required class="form-control" rows="3" maxlength="200" name="excerpt">{{$post->excerpt}}</textarea>
                            <p>توجه داشته باشید؛ چکیده پست باید کمتر از 200 کاراکتر باشد.</p>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="ویرایش پست">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $( "#selection" ).change(function () {
            var str = "";
            $( "select option:selected" ).each(function() {
                str += $( this ).text() + " - ";
            });
            $( "#cati" ).text( str );
        }).append();
    </script>
@endsection
@section('table-script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <script src="/admintheme/vendors/switchery/dist/switchery.min.js"></script>
    <script src="/admintheme/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
