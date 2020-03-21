@extends('layouts.admin')
@section('link')
    <style>
        .per {
            float: contour;
            margin-right: 5px;
            margin-top: 5px;
            width: 100px;
            height: 100px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('form').ajaxForm(function () {
                alert("Uploaded SuccessFully");
            });
        });

        function preview_image() {
            var total_file = document.getElementById("upload_file").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<img class='per' src='" + URL.createObjectURL(event.target.files[i]) + "'>");
            }
        }
    </script>
@endsection
@section('page-title')
    ویرایش محصول
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
                    <form id="demo-form2" action="{{route('product.update',$product->id)}}"
                          enctype="multipart/form-data"
                          method="POST"
                          data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">نام محصول
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="name" type="text" id="first-name" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">نام برند
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brand"
                                       class="form-control col-md-7 col-xs-12" value="{{$product->brand}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">قیمت محصول (تومان)
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="price" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                تخفیف (درصد)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="{{$product->discount}}" class="form-control col-md-7 col-xs-12"
                                       name="discount" type="number" onKeyPress="if(this.value.length==2) return false;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">دسته بندی
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                دسته های انتخاب شده برای این محصول:
                                <div id="cati">@php $categories = explode("%" , $product->cat); @endphp
                                    @foreach($categories as $category)
                                        {{$category}} -
                                    @endforeach
                                </div>
                                <select multiple name="cat[]" onchange="myFunction(this.value)"
                                        id="selection" class="form-control">
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
                                وضعیت
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p>
                                    <?php $checked = ''; $unchecked = ''; ?>
                                    @if($product->status == '1')
                                        <?php $checked = 'checked' ?>
                                    @else
                                        <?php $unchecked = 'checked' ?>
                                    @endif
                                    موجود
                                    <input type="radio" class="flat" name="status" id="genderM" value="1"
                                           {{$checked}} required/>
                                    ناموجود
                                    <input type="radio" class="flat" name="status" id="genderF"
                                           value="0" {{$unchecked}}/>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات محصول<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="body" class="date-picker form-control col-md-7 col-xs-12"
                                          required="required" rows="5" type="text">{{$product->body}}</textarea>
                            </div>
                        </div>
                        {{--گالری تصاویر--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>تصاویر بند انگشتی محصول</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            @foreach($images as $pic)
                                                <div class="col-md-55">
                                                    <div class="thumbnail">
                                                        <div class="image view view-first">
                                                            <img style="width: 100%; display: block;"
                                                                 src="{{env('Product_img').$pic->path}}"/>
                                                            <div class="mask">
                                                            </div>
                                                        </div>
                                                        <div class="caption">
                                                            <a href="{{route('del.pic', ['id' =>$pic->id , 'pid'=>$pic->products_id])}}"
                                                               class="btn btn-danger">
                                                                <i class="fa fa-times"></i> حذف
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">تغییر تصویر شاخص</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="image" type='file' onchange="readURL(this);"/><br>
                                <img id="blah" src="{{env('Product_img').$product->main_image}}" width="100%">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">افزودن تصاویر بیشتر</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="upload_file" name="images[]" onchange="preview_image();"
                                       multiple/>
                            </div>
                        </div>

                        <div id="image_preview"></div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-lg btn-primary">ویرایش محصول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("input").keypress(function(e){
            var charCode = !e.charCode ? e.which : e.charCode;

            if(/* Test for special character */ )
                e.preventDefault();
        })
        $("#selection").change(function () {
            var str = "";
            $("select option:selected").each(function () {
                str += $(this).text() + " - ";
            });
            $("#cati").text(str);
        }).append();
    </script>
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
