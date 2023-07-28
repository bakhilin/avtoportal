@extends('layout')

@section('page_name')
    Авторизация | Автопортал 3D
@endsection

@section('main_content')

    <div class="col-md-6 mx-auto">
        <form action="{{route('user.login')}}" method="post" class="form-site">
            <h2>Авторизация</h2>
            @csrf
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control mx-auto"> <br>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" class="form-control mx-auto"> <br>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" name="btn_login" class="btn btn-success">Войти</button>
            <br>
            <span class="under-text">Нет аккаунта? <a href="{{route('user.registration')}}">Регистрация</a></span>
        </form>
    </div>
@endsection

