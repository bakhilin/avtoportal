

@extends('layout')

@section('page_name')
    Регистрация | Автопортал 3D
@endsection

@section('main_content')
    <h2>Регистрация пользователя</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('user.registration')}}" method="post">
        @csrf
        <input type="text" name="phone" placeholder="Телефон" class="form-control"> <br>
        <input type="password" name="password" placeholder="Пароль(не менее 8 символов)" class="form-control"> <br>
        <input type="email" name="email" placeholder="Email" class="form-control"> <br>
        <input type="text" name="name" placeholder="Контактное лицо (ФИО)" class="form-control"> <br>
        <button type="submit" value="" name="regBtn" class="btn btn-success">Зарегистрироваться</button>
    </form>
@endsection
