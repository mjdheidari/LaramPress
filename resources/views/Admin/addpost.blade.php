@extends('layouts.admin')
@section('link')
    <script src="/admintheme/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
@endsection
@section('page-title')
    افزودن پست جدید
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
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="text" hidden name="auth" value="{{Auth::user()->id}}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">عنوان پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input value="{{old('title')}}" required name="title" type="text" class="form-control" placeholder="عنوان پست">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">انتخاب دسته بندی</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="cat[]" class="select2_multiple form-control" multiple="multiple">
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
                            <input value="{{old('tag[]')}}" name="tag[]" id="tags_1" type="text" class="tags form-control"/>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تصویر شاخص</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{old('image')}}" name="image" type='file' onchange="readURL(this);" /><br>
                            <img id="blah"  src="/admintheme/build/images/product.png" width="100%">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">محتوای پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea required class="form-control" id="summary-ckeditor" name="content">{{old('content')}}</textarea>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">چکیده پست</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea required class="form-control" rows="3" maxlength="200" name="excerpt">{{old('excerpt')}}</textarea>
                            <p>توجه داشته باشید؛ چکیده پست باید کمتر از 200 کاراکتر باشد.</p>
                            <div id="suggestions-container"
                                 style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <input id="submit-form" type="submit" class="btn btn-success" value="ثبت پست">
                        </div>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
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
