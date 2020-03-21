@extends('layouts.admin')
@section('page-title')
    مدیریت دسته بندی محصولات
@endsection
@section('content')
    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>افزودن دسته بندی جدید</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('productscat.store')}}" method="POST" class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">عنوان دسته جدید</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input required name="title" type="text" class="form-control"
                                   placeholder="عنوان دسته بندی جدید">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات دسته جدید</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea required name="desc" type="text" class="form-control"
                                      placeholder="توضیحات دسته جدید" rows="3"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">والد</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">


                            <select class="form-control" name="parent">
                                <option hidden disabled selected>انتخاب والد برای دسته بندی جدید</option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}
                                    </option>
                                @endforeach
                            </select>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="ایجاد دسته">
                        </div>
                    </div>
                </form>
                <div class="alert alert-dark" role="alert">
                    توجه داشته باشید؛ برای حذف یک دسته به همراه تمام دسته های زیر مجموعه، باید تمام دسته های زیر مجموعه به همراه دسته مادر را از قسمت "نمای کلی دسته بندی ها" حذف کنید.
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>لیست دسته بندی ها </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div style="font-size: large" class="x_content">
                @foreach($parentCategories as $category)
                    <ul>
                        <li>{{$category->title}}</li>
                        @if(count($category->subcategory))
                            @include('admin.subCategoryList',['subcategories' => $category->subcategory])
                        @endif
                    </ul>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-6 col-xs-12">
        {{--<div class="x_panel">
            <div class="x_title">
                <h2> حذف و ویرایش دسته ها</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div style="font-size: large" class="x_content">
                <table>
                    <thead>
                    <tr>
                        <th>عنوان دسته</th>
                        <th>تغییرات</th>
                    </tr>
                    </thead>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                @foreach($cats as $cat)
                @endforeach
            </div>
        </div>--}}

        <div class="col-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>نمای کلی دسته بندی ها
                        <small>حذف و ویرایش</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($cats as $cat)
                        <article class="media event">
                            <a class="pull-left date popupview" id="{{$cat->id}}" href="#">
                                <p class="day"><i class="fa fa-cog fa-spin"></i></p>
                            </a>
                            <div class="media-body popupview">
                                <a class="title popupview" id="{{$cat->id}}" href="#">{{$cat->title}}</a>
                                <p>{{$cat->desc}}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!--modal-->

    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="mform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="mtitle">Modal title</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">عنوان دسته : </label>
                            <input name="title" type="text" class="form-control" id="cat_title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">توضیحات : </label>
                            <textarea required class="form-control" name="desc" id="desc"></textarea>
                        </div>
                        <label for="message-text" class="col-form-label">والد : </label>
                        <select id="mparent" class="form-control">
                            <option id="nonparent" value="0" selected>بدون والد (دسته مادر)</option>
                            @foreach($cats as $cat)
                                <option id="{{$cat->id}}" value="{{$cat->id}}" hidden disabled>{{$cat->title}}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            برای تغییر والد هر دسته، می بایست دسته را پاک کرده و سپس دسته ای جدید با همان مشخصات ایجاد کنید.
                        </div>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" class="btn btn-primary" value="ذخیره تغییرات">
            </form>
            <form style="display: inline" id="destroy" action="" method="post">
                <input type="submit" class="btn btn-danger" value="حذف دسته بندی">
                @csrf @method('DELETE')
            </form>
                    </div>
                </div>
        </div>
    </div>

    {{--end modal--}}


    <script type="text/javascript">
        $(document).ready(function (e) {
            $(".popupview").click(function (e) {
                var Id = $(this).attr("id");
                $.ajax({
                    url: "{{route('productscat.show',1)}}",
                    type: 'GET',
                    dataType: "json",
                    data: {"ide": Id},
                    success: function (data) {
                        $('#Modal').modal('show');
                        document.getElementById("mtitle").innerHTML = data.title;
                        $("#cat_title").val(data.title);
                        $("#desc").val(data.desc);
                        if (data.parent == 0) {
                            $("#mparent").val("0").change();
                        } else {
                            $("."+data.parent).removeAttr('hidden');
                            $("#mparent").val(data.parent).change();
                            $('#nonparent').attr('hidden','');
                        }
                        var product_id = data.id;
                        var url = '{{ route("productscat.update", ":id") }}';
                        url = url.replace(':id', product_id);
                        var urll = '{{route("productscat.destroy", ":id")}}';
                        urll = urll.replace(':id', data.id);
                        $('#mform').attr('action', url);
                        $('#destroy').attr('action', urll);
                        /*$("#mparent option[value=data.parent]").attr('selected', 'selected');*/
                        /*$('#mparent').append($('<option selected disabled hidden>').val(data.id).text(data.title));
                        $("#admin_name").html(data.name);
                        $("#email").html(data.email);
                        $('#level').append($('<option selected disabled hidden>').val(data.level).text(data.level));
                        $("#about").html(data.about);
                        $("#delete").attr('action', document.getElementById(Id+Id).value);
                        $("#save").attr('action', document.getElementById(Id+Id+Id).value);*/
                    }
                });
            });
        });
    </script>
@endsection
