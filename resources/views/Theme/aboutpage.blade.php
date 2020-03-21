@extends('layouts.PagesTheme')
@section('tab-title')
    درباره ما
@endsection

@section('style')
    {{--<style>
        input[type=text], input[type=email], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>--}}
@endsection

@section('title')
    درباره ما
@endsection

@section('content')
    <div>
        {{$data}}
    </div>
@endsection


