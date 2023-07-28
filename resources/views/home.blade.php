<?php

if (isset($_GET['search'])) {
    $spares = DB::table('avto_spare')->where('name', 'LIKE', '%' . $_GET['search'] . '%')->get();
} else {
    $spares = DB::table('avto_spare')->take(15)->get();
}

?>

@extends('layout')


@section('main_content')

    <div class="container list">
        <ul class="row">
            <div class="col-sm-6">
                <a href="{{route('avto.liquids')}}">
                    <li>
                          <span>
                               Масла и технические жидкости
                          </span>
                    </li>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="/">
                    <li>
                        <span>
                            Легковые запчасти
                        </span>
                    </li>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('avto.period_product')}}">
                    <li>
                        <span>
                            Сезонные товары
                        </span>
                    </li>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('avto.period_product')}}">
                    <li>
                        <span>
                            Сезонные товары
                        </span>
                    </li>
                </a>
            </div>
        </ul>
    </div>

    <div class="container mt-5">
        <h2>Каталог легковых автозапчастей</h2>
        <form action="" method="get" class="search-form col-6">
            <div class="row">
                <div class="col-8">
                    <input type="search" name="search" id="search" class="search" placeholder="Поиск по названию">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-info">Поиск</button>
                </div>
            </div>
        </form>

        <div class="cards-block" id="cards-block">
            @foreach($spares as $spare)
                <div class="card mb-3 border" style="max-width: 100%; max-height: 150px">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <a href="">
                                <img src="img/{{$spare->image_link}}" class="img-fluid mx-auto d-block"
                                     style="max-height: 135px; max-width: 180px" alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-dark">
                                <a href="{{route('avto.parts')}}?spareId={{$spare->id}}">
                                    <h5 class="card-title">{{$spare->name}}</h5>
                                </a>
{{--                                <p class="card-text"><span>{{$spare->description}}</span></p>--}}
                            </div>
                        </div>
                        <div class="col-md-2 position-relative">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <p style="margin: 0;">
                                    <b class="text-dark">{{$spare->price}}₽</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::check() and  Auth::user()->email == "bahilinvit@mail.ru")
                    <a href="/?detailId={{$spare->id}}">Удалить товар</a>
                @endif
            @endforeach
        </div>
    </div>


    {{--    <div class="container">--}}
    {{--        --}}
    {{--        <h3>Выбор автомобиля</h3>--}}
    {{--        <form action="" method="get">--}}
    {{--            <label for="marka">Марка</label>--}}
    {{--            <select name="marka" id="marka" class="form-control">--}}
    {{--                <option disabled selected value="">Выберите марку</option>--}}
    {{--                @foreach($marka as $key => $mark)--}}
    {{--                    <option value="{{$mark->id}}">{{$mark->name}}</option>--}}
    {{--                @endforeach--}}
    {{--            </select>--}}
    {{--            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>--}}
    {{--        </form>--}}
    {{--        <form action="" method="get">--}}
    {{--            <div class="form-group model-select">--}}
    {{--                <label for="model">Модель</label>--}}
    {{--                <select class="form-control" name="model" id="model">--}}
    {{--                    @if(isset($_GET['marka']))--}}
    {{--                        @php($models = DB::table('avto_model')->where('marka_id', $_GET['marka'])->get())--}}
    {{--                        @foreach($models as $key => $models)--}}
    {{--                            <option value="{{$models->id}}">{{$models->name}}</option>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </select>--}}
    {{--            </div>--}}
    {{--            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>--}}
    {{--        </form>--}}
    {{--        <form action="{{route('avto.spare')}}" method="get">--}}
    {{--            <div class="form-group">--}}
    {{--                <label for="model">Тип</label>--}}
    {{--                <select class="form-control" name="type" id="type">--}}
    {{--                    @if(isset($_GET['model']))--}}
    {{--                        @php($type = DB::table('avto_type_model')->where('model_id', $_GET['model'])->get())--}}
    {{--                        @foreach($type as $key => $type)--}}
    {{--                            <option value="{{$type->id}}">{{$type->type_model}}</option>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </select>--}}
    {{--            </div>--}}
    {{--            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}

@endsection

