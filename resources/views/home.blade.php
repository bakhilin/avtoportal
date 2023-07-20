<?php

if (isset($_GET['search'])) {
    $spares = DB::table('avto_spare')->where('name', 'LIKE', '%' . $_GET['search'] . '%')->get();
} else {
    $spares = DB::table('avto_spare')->take(15)->get();
}

?>

@extends('layout')


@section('main_content')

    <div class="container bg-white text-dark">
        <ul>
            <li>
                <a href="{{route('avto.liquids')}}"> Масла и технические жидкости </a>
            </li>
            <li>
                <a href="{{route('avto.parts')}}">Легковые запчасти</a>
            </li>
            <li>
                <a href="{{route('avto.period_product')}}"> Сезонные товары </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <h2>Каталог легковых автозапчастей</h2>
        <form action="" method="get" class="search-form">
            <input type="search" name="search" id="search" class="search" placeholder="Поиск по названию">
            <button type="submit">Поиск</button>
        </form>

        <div class="cards-block" id="cards-block">
            @foreach($spares as $spare)
                <div class="card mb-3 border" style="max-width: 100%; max-height: 150px">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <a href="">
                                <img src="img/{{$spare->image_link}}" class="img-fluid mx-auto d-block" style="max-height: 135px; max-width: 180px" alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-dark">
                                <h5 class="card-title">{{$spare->name}}</h5>
                                <p class="card-text">{{$spare->description}}</p>
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

