

@extends('layout')

@section('page_name')
        Личный кабинет
@endsection

@section('main_content')
    {{Auth::user()->name}}
    {{Auth::user()->email}}
@endsection
