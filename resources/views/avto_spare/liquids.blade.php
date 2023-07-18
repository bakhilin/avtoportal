@extends('layout')

<a href="/">Вернуться</a>

@section('main_content')
    <h2> Масла и технические жидкости </h2>
    <div class="container">
        <?php $typeLiquids = DB::table('type_liquid')->get() ?>
        <ul>
            @foreach($typeLiquids as $type)
                <li>{{$type->name}}</li>
                    <?php $liquids = DB::table('liquid')->where('type_id', $type->id)->get() ?>
                <ul>
                    <li><a href="">
                            @foreach($liquids as $liquid)
                                {{$liquid->name}}
                            @endforeach
                        </a>
                    </li>
                </ul>
            @endforeach
        </ul>
    </div>
@endsection
