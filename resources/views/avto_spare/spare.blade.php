@extends('layout')

@section('main_content')
    {{$type_avto = DB::table('avto_type_model')->where('id', $_GET['type'])->get()}}


    <div class="container">

    </div>
@endsection
