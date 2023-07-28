

@extends('layout')

@section('page_name')
    Регистрация | Автопортал 3D
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-6 mx-auto">
        <form action="{{route('user.registration')}}" method="post" class="form-site">
            <h4>Регистрация пользователя</h4>
            @csrf
            <input type="text" name="phone" placeholder="Телефон" class="form-control mx-auto"> <br>
            <input type="password" name="password" placeholder="Пароль(не менее 8 символов)" class="form-control mx-auto"> <br>
            <input type="email" name="email" placeholder="Email" class="form-control mx-auto"> <br>
            <input type="text" name="name" placeholder="Контактное лицо (ФИО)" class="form-control mx-auto"> <br>

            <button type="submit" value="" name="regBtn" class="btn btn-success">Зарегистрироваться</button>
            <br>
            <span class="under-text">Уже есть аккаунт? <a href="{{route('user.login')}}">войти</a></span>
        </form>
    </div>


@endsection
