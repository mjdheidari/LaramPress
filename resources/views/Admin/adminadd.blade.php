@extends('layouts.admin')
@section('page-title')
    افزودن مدیر جدید
@endsection
@section('content')
    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>مشخصات مدیر جدید</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section class="login_content">
                    <form method="POST" action="{{ route('managment.store') }}">
                        @csrf
                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="نام کاربری">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                            {{--<input type="text" class="form-control" placeholder="نام کاربری" required=""/>--}}
                        </div>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="ایمیل">
                        </div>

                        <div>
                            <select required name="level" class="form-control">
                                <option hidden selected disabled>تعیین سطح دسترسی</option>
                                <option value="admin">admin</option>
                                <option value="seller">seller</option>
                                <option value="writer">writer</option>
                            </select><br>

                        </div>
                        <div>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password" placeholder="رمز ورود">
                            {{--@error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror--}}
                            {{--<input type="password" class="form-control" placeholder="رمز ورود" required=""/>--}}
                        </div>
                        <div>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="تکرار رمز عبور">
                        </div>
                        <div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $error }}</strong>
                                </span><br>
                                @endforeach
                            @endif
                            <button type="submit" class="btn btn-default submit">
                                ثبت اطلاعات
                            </button>
                            {{--<a class="btn btn-default submit" href="index.html">ارسال</a>--}}
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>انتخاب کاربر سایت به عنوان مدیر</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                برای انتخاب هریک از کاربران به عنوان مدیر، تنها با مشخص کردن سطح دسترسی، کاربر مورد نظر
                                به لیست مدیران سایت افزوده می شود.
                            </p>

                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>سطح دسترسی</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <form action="{{route('managment.edit' , $user->id)}}" method="post">
                                            @csrf @method('GET')
                                            <select class="form-control" name="level" onchange="this.form.submit()">
                                                <option disabled hidden selected>سطح دسترسی</option>
                                                <option value="admin">ادمین</option>
                                                <option value="seller">فروشنده</option>
                                                <option value="writer">نویسنده</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('table-script')
    <script src="/admintheme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admintheme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/admintheme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/admintheme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/admintheme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/admintheme/vendors/pdfmake/build/vfs_fonts.js"></script>
@endsection
