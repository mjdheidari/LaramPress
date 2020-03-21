@extends('layouts.admin')
@section('page-title')
    پنل کاربری
@endsection
@section('content')
    @if(Auth::user()->level == 'manager')
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user-circle"></i></div>
                    <div class="count">{{$info['users']}}</div>
                    <h3>تعداد کاربران</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                    <div class="count">{{$info['posts']}}</div>
                    <h3>تعداد پست ها</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <div class="count">{{$info['products']}}</div>
                    <h3>تعداد محصولات</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{$info['admins']}}</div>
                    <h3>مدیران سایت</h3>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->level == 'admin')
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user-circle"></i></div>
                    <div class="count">{{$info['users']}}</div>
                    <h3>تعداد کاربران</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                    <div class="count">{{$info['posts']}}</div>
                    <h3>تعداد پست ها</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <div class="count">{{$info['products']}}</div>
                    <h3>تعداد محصولات</h3>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->level == 'seller')
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user-circle"></i></div>
                    <div class="count">{{$info['users']}}</div>
                    <h3>تعداد کاربران</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <div class="count">{{$info['products']}}</div>
                    <h3>تعداد محصولات</h3>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->level == 'writer')
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user-circle"></i></div>
                    <div class="count">{{$info['users']}}</div>
                    <h3>تعداد کاربران</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <div class="count">{{$info['products']}}</div>
                    <h3>تعداد محصولات</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
