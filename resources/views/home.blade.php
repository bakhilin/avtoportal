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
        <h3>Выбор автомобиля</h3>
        <form action="" method="get">
            <label for="marka">Марка</label>
            <select name="marka" id="marka" class="form-control">
                <option disabled selected value="">Выберите марку</option>
                @foreach($marka as $key => $mark)
                    <option value="{{$mark->id}}">{{$mark->name}}</option>
                @endforeach
            </select>
            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>
        </form>
        <form action="" method="get">
            <div class="form-group model-select">
                <label for="model">Модель</label>
                <select class="form-control" name="model" id="model">
                    @if(isset($_GET['marka']))
                        @php($models = DB::table('avto_model')->where('marka_id', $_GET['marka'])->get())
                        @foreach($models as $key => $models)
                            <option value="{{$models->id}}">{{$models->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>
        </form>
        <form action="{{route('avto.spare')}}" method="get">
            <div class="form-group">
                <label for="model">Тип</label>
                <select class="form-control" name="type" id="type">
                    @if(isset($_GET['model']))
                        @php($type = DB::table('avto_type_model')->where('model_id', $_GET['model'])->get())
                        @foreach($type as $key => $type)
                            <option value="{{$type->id}}">{{$type->type_model}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" id="submit" name="btnMark" class="btnMarka">Выбрать</button>
        </form>
    </div>


@endsection

