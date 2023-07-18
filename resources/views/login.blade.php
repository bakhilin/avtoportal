@extends('layout')

@section('page_name')
    Авторизация | Автопортал 3D
@endsection

@section('main_content')
    <h2>Авторизация</h2>
    <form action="{{route('user.login')}}" method="post" >
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control"> <br>
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Пароль" class="form-control"> <br>
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" name="btn_login" class="btn btn-success">Войти</button>
    </form>
@endsection

