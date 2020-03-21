@extends('layouts.admin')
@section('page-title')
    مشخصات کاربری {{$cart->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-6" style="background-color: #761c19">
            <img src="{{env('PI').Auth::user()->image}}" alt="">
        </div>
    </div>
@endsection
