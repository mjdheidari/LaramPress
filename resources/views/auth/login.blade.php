<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>فرم ورود | ثبت نام</title>

    <!-- Bootstrap -->
    <link href="{{url('admintheme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('admintheme/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('admintheme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('admintheme/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('admintheme/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('admintheme/build/css/custom.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="reset"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <h1>فرم ورود</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                               placeholder="ایمیل"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        {{--@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror--}}
                    </div>
                    <div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="رمز ورود" autocomplete="current-password" required name="password"/>
                        {{--@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror--}}
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span><br>
                        @endforeach
                    @endif
                    <div class="text-center">
                        <button type="submit" class="btn btn-default submit">
                            ورود
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <a href="{{--{{ route('password.request') }}--}}#">
                                رمز ورود را فراموش کرده اید؟
                            </a>
                        </p>

                        <p class="change_link">
                            <a href="{{route('register')}}" class="to_register">ایجاد حساب کاربری در سایت</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
