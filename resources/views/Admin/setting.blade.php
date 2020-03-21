@extends('layouts.admin')
@section('link')

    <style>
        .md-avatar.size-3 {
            width: 90px;
            height: 90px;
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('page-title')
    تنظیمات حساب کاربری
@endsection
@section('content')
    @if($errors->has('newpass'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span>
            </button>
            {{$errors->first()}}
        </div>

    @endif
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span>
        </button>
        {{Session::get('message')}}
    </div>
    @endif
    <div class="">

        <div class="col-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i>ویرایش حساب کاربری
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <p class="lead">مشخصات عمومی حساب کاربری</p>
                                <ul>
                                    <li>نام کاربری شما : <strong>{{Auth::user()->name}}</strong></li>
                                    <li>ایمیل شما : <strong>{{Auth::user()->email}}</strong></li>
                                    @php( $v = Facades\Verta::instance(Auth::user()->created_at) )
                                    <li>تاریخ عضویت شما : <strong>{{$v->format('%d %B، %Y')}} ( {{$v->format('H:i')}}
                                            )</strong></li>
                                </ul>
                                <button class="btn btn-primary edit-info" type="submit">ویرایش</button>
                            </div>
                            <div class="tab-pane" id="about">
                                <p class="lead">درباره من</p>
                                @if(empty(Auth::user()->about))
                                    <button class="btn btn-primary edit-about" type="submit">افزودن</button>
                                @else
                                    <p>{{Auth::user()->about}}</p><br>
                                    <button class="btn btn-primary edit-about" type="submit">ویرایش</button>
                                @endif
                            </div>

                            <div class="tab-pane" id="password">
                                <p class="lead">تغییر رمز عبور</p>
                                <form action="{{route("setting.resetpassword" , Auth::user()->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="col-form-label">رمز عبور جدید</label>
                                        <input name="newpass" type="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">تکرار رمز عبور جدید</label>
                                        <input name="confnewpass" type="password" class="form-control">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="ویرایش">

                                </form>
                            </div>
                            <div class="tab-pane" id="level">
                                <p class="lead">سطح دسترسی</p>
                                @if(Auth::user()->level!='manager')
                                    به صلاحدید مدیریت سایت، برای شما سطح دسترسی {{Auth::user()->level}} تعریف گردیده
                                    است.
                                    فعالیت های مجاز برای شما، در این سطح دسترسی عبارت است از :
                                @else
                                    شما با بالاترین سطح دسترسی، مدیر این سایت هستید.
                                @endif
                                <ul>
                                    @if(Auth::user()->level=='admin')
                                        <li>مشاهده پست ها</li>
                                        <li>ویرایش پست ها</li>
                                        <li>حذف پست ها</li>
                                        <li>مشاهده محصولات</li>
                                        <li>ویرایش محصولات</li>
                                        <li>حذف محصولات</li>
                                    @elseif(Auth::user()->level=='seller')
                                        <li>مشاهده محصولات</li>
                                        <li>ویرایش محصولات</li>
                                        <li>حذف محصولات</li>
                                    @elseif(Auth::user()->level=='writer')
                                        <li>مشاهده پست ها</li>
                                        <li>ویرایش پست ها</li>
                                        <li>حذف پست ها</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="tab-pane" id="image">
                                <p class="lead">انتخاب آواتار</p>
                                <div class="col-12">

                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'m1.jpg'])}}">
                                        <img src="/avatar/m1.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'m2.jpg'])}}">
                                        <img src="/avatar/m2.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'m3.jpg'])}}">
                                        <img src="/avatar/m3.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'m4.jpg'])}}">
                                        <img src="/avatar/m4.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'w1.jpg'])}}">
                                        <img src="/avatar/w1.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'w2.jpg'])}}">
                                        <img src="/avatar/w2.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'w3.jpg'])}}">
                                        <img src="/avatar/w3.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>
                                    <a href="{{route('setting.image',['id'=>Auth::user()->id , 'image'=>'w4.jpg'])}}">
                                        <img src="/avatar/w4.jpg" alt="Avatar" class="md-avatar size-3 img-rounded">
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a href="#info" data-toggle="tab">مشخصات کاربری</a>
                            </li>
                            <li><a href="#about" data-toggle="tab">درباره من</a>
                            </li>
                            <li><a href="#level" data-toggle="tab">سطح دسترسی</a>
                            </li>
                            <li><a href="#image" data-toggle="tab">تصویر</a>
                            </li>
                            <li><a href="#password" data-toggle="tab">رمز عبور</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>

    {{--modal info--}}
    <div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">مشخصات عمومی حساب کاربری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.info' , Auth::user()->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-form-label">نام کاربری</label>
                            <input name="name" type="text" class="form-control" value="{{Auth::user()->name}}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">ایمیل</label>
                            <input name="email" type="email" class="form-control" value="{{Auth::user()->email}}">
                        </div>

                    </div>
                    @if ($errors->has('name')|| $errors->has('email'))

                        <div style="color: red" class="text-center alrt-info">
                            <strong>{{$errors->first('name')}}</strong>
                            <br>
                            <strong>{{$errors->first('email')}}</strong>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <input type="submit" class="btn btn-success" value="ویرایش">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--modal about--}}
    <div class="modal fade" id="aboutmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">درباره من</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.about' , Auth::user()->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-form-label">متن درباره من</label>
                            <textarea name="about" type="text" class="form-control"
                                      rows="3">{{Auth::user()->about}}</textarea>
                        </div>

                    </div>
                    @if ($errors->has('about'))

                        <div style="color: red" class="text-center alrt-about">
                            <strong>{{$errors->first('about')}}</strong>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <input type="submit" class="btn btn-success" value="ویرایش">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (e) {
            if ($('.alrt-about').length) {
                $('#aboutmodal').modal('show');
            }

            if ($('.alrt-info').length) {
                $('#infomodal').modal('show');
            }

            $(".edit-info").click(function (e) {
                $('#infomodal').modal('show');
            });

            $(".edit-about").click(function (e) {
                $('#aboutmodal').modal('show');
            });
        });
    </script>
@endsection
@section('table-script')

@endsection


