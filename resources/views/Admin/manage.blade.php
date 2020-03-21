@extends('layouts.admin')

@section('page-title')
    مدیریت سایت
@endsection

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> مشاهده مدیران سایت براساس سطح دسترسی</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start accordion -->
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                           aria-controls="collapseOne">
                            <h4 class="panel-title">لیست تمامی مدیران</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>ایمیل</th>
                                        <th>نقش</th>
                                        <th >مشاهده و ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td width="35%"> {{$user->name}}</td>
                                            <td width="20%">{{$user->email}}</td>
                                            <td width="20%">{{$user->level}}</td>
                                            <td width="25%">
                                                <button @php if ($user->level == 'manager'){echo 'disabled';} @endphp
                                                    id="{{$user->id}}" class="btn btn-primary btn-sm show">مشاهده |
                                                    ویرایش
                                                </button>
                                                <input id="{{$user->id}}{{$user->id}}" hidden type="text" value="{{route('managment.destroy',$user->id)}}">
                                                <input id="{{$user->id}}{{$user->id}}{{$user->id}}" hidden type="text" value="{{route('managment.update',$user->id)}}">
                                                <input id="{{$user->id}}{{$user->id}}{{$user->id}}{{$user->id}}" hidden type="text" value="{{route('disable',$user->id)}}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                           aria-controls="collapseThree">
                            <h4 class="panel-title">معرفی سطوح دسترسی مدیران</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#manager"
                                                                                          id="home-tabb"
                                                                                          role="tab" data-toggle="tab"
                                                                                          aria-controls="home"
                                                                                          aria-expanded="true">مدیریت
                                                        اصلی</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#admin" role="tab"
                                                                                    id="profile-tabb"
                                                                                    data-toggle="tab"
                                                                                    aria-controls="profile"
                                                                                    aria-expanded="false">ادمین</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#seller" role="tab"
                                                                                    id="profile-tabb3"
                                                                                    data-toggle="tab"
                                                                                    aria-controls="profile"
                                                                                    aria-expanded="false">فروشنده</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#writer" role="tab"
                                                                                    id="profile-tabb3"
                                                                                    data-toggle="tab"
                                                                                    aria-controls="profile"
                                                                                    aria-expanded="false">نویسنده</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#editor" role="tab"
                                                                                    id="profile-tabb3"
                                                                                    data-toggle="tab"
                                                                                    aria-controls="profile"
                                                                                    aria-expanded="false">ویرایشگر</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent2" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="manager"
                                                     aria-labelledby="home-tab"><br><br>
                                                    <p>
                                                        شما در این سطح از دسترسی، امکان:
                                                    <ul>
                                                        <li>افزودن محصول جدید</li>
                                                        <li>ویرایش یک یا تمام محصولات</li>
                                                        <li>حذف یک یا تمام محصولات</li>
                                                        <li>افزودن پست جدید</li>
                                                        <li>ویرایش یک یا تمام پست های پیشین</li>
                                                        <li>حذف یک یا تمام پست های پیشین</li>
                                                        <li>ایجاد مدیر جدید با سطح دسترسی مشخص</li>
                                                        <li>ویرایش سطح دسترسی هریک از مدیران سایت</li>
                                                        <li>حذف هریک از مدیران</li>
                                                        را دارا هستید.
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="admin"
                                                     aria-labelledby="profile-tab"><br><br>
                                                    <p>
                                                        کاربر با این سطح از دسترسی، امکان:
                                                    <ul>
                                                        <li>افزودن محصول جدید</li>
                                                        <li>ویرایش یک یا تمام محصولات</li>
                                                        <li>حذف یک یا تمام محصولات</li>
                                                        <li>افزودن پست جدید</li>
                                                        <li>ویرایش یک یا تمام پست های پیشین</li>
                                                        <li>حذف یک یا تمام پست های پیشین</li>
                                                        را دارا میباشد.
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="seller"
                                                     aria-labelledby="profile-tab"><br><br>
                                                    <p>
                                                        کاربر با این سطح از دسترسی، امکان:
                                                    <ul>
                                                        <li>افزودن محصول جدید</li>
                                                        <li>ویرایش یک یا تمام محصولات</li>
                                                        <li>حذف یک یا تمام محصولات</li>
                                                        را دارا میباشد.
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="writer"
                                                     aria-labelledby="profile-tab"><br><br>
                                                    <p>
                                                        کاربر با این سطح از دسترسی، امکان:
                                                    <ul>
                                                        <li>افزودن پست جدید</li>
                                                        <li>ویرایش یک یا تمام پست های پیشین</li>
                                                        <li>حذف یک یا تمام پست های پیشین</li>
                                                        را دارا میباشد.
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="editor"
                                                     aria-labelledby="profile-tab"><br><br>
                                                    <p>
                                                        کاربر با این سطح از دسترسی، امکان:
                                                    <ul>
                                                        <li>ویرایش یک یا تمام پست های پیشین</li>
                                                        <li>حذف یک یا تمام پست های پیشین</li>
                                                        را دارا میباشد.
                                                    </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 ">
                            <!--Carousel Wrapper-->
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                 data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img id="profile2" class="center-block d-block w-100" src="" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="accordion md-accordion">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree3">
                                        <h5 class="mb-0">
                                            مشخصات ادمین
                                        </h5>
                                    </div>
                                    <div>
                                        <div class="card-body">
                                            <h3 id="admin_name"></h3>
                                            <p>
                                                ایمیل : <strong id="email"></strong>
                                            </p>
                                            <form id="save" action="" method="post">
                                            نقش کاربری :
                                                @csrf @method('PUT')
                                            <select style="width: 50%;" class="form-control"
                                                    onchange="this.form.submit()" name="level" id="level">
                                                <option value="admin">admin</option>
                                                <option value="seller">seller</option>
                                                <option value="writer">writer</option>
                                            </select>
                                            </form>
                                            <p>
                                                درباره :
                                            <p id="about"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <form id="delete" action="" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger">حذف حساب کاربر
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <form id="disable" action="" method="post">
                                        @csrf
                                        <button class="btn btn-danger">لغو تمام دسترسی ها
                                            <small>(حذف از لیست مدیران)</small>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function (e) {
            $(".show").click(function (e) {
                var Id = $(this).attr("id");
                $('select').on('change', function () {
                    $('#savechange').removeAttr("disabled");
                });
                $.ajax({
                    url: "{{route('managment.show',2)}}",
                    type: 'GET',
                    dataType: "json",
                    data: {"ide": Id},
                    success: function (data) {
                        /*alert(status);
                        alert(elmId);*/
                        var src1 = '{{env('PI')}}';
                        var src2 = data.image;
                        var res = src1 + src2;
                        $('#modalQuickView').modal('show');
                        /*document.getElementById("modal-body").innerHTML = data.id;*/
                        $("#profile2").attr("src", res);
                        $("#admin_name").html(data.name);
                        $("#email").html(data.email);
                        $('#level').append($('<option selected disabled hidden>').val(data.level).text(data.level));
                        $("#about").html(data.about);
                        $("#delete").attr('action', document.getElementById(Id+Id).value);
                        $("#disable").attr('action', document.getElementById(Id+Id+Id+Id).value);
                        $("#save").attr('action', document.getElementById(Id+Id+Id).value);
                    }
                });
            });
        });
    </script>
@endsection

