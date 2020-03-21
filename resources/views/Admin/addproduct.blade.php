@extends('layouts.admin')
@section('page-title')
    ثبت محصول جدید
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        مشخصات محصول
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" action="{{route('product.store')}}" enctype="multipart/form-data" method="POST"
                          data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >نام محصول
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="name" type="text" id="first-name" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >نام برند
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"  name="brand"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >قیمت محصول (تومان)
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="price" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >دسته بندی
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select multiple name="cat[]" class="form-control">
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->title}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                <p>با نگه داشتن دکمه Ctrl میتوانید چند دسته را انتخاب کنید. <a
                                        href="{{route('productscat.index')}}" style="color: #BA2121">
                                        افزودن دسته جدید
                                    </a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                تخفیف (درصد)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="discount" type="number"
                                        onKeyPress="if(this.value.length==2) return false;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                وضعیت
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p>
                                    موجود
                                    <input type="radio" class="flat" name="status" id="genderM" value="1" checked required/>
                                    ناموجود
                                    <input type="radio" class="flat" name="status" id="genderF" value="0"/>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات محصول<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="body" class="date-picker form-control col-md-7 col-xs-12"
                                          required="required" rows="5" type="text"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">آپلود تصویر</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="image" type='file' onchange="readURL(this);" /><br>
                                <img id="blah"  src="/admintheme/build/images/product.png" width="100%">
                                <p>برای افزودن تصاویر بیشتر از قسمت ویرایش محصول، تصاویر بیشتری را آپلود کنید.</p>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-lg btn-primary">ثبت محصول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
