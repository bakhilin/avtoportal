<?php

$type_of_spare = DB::table('avto_type')->get();
$marka = DB::table('avto_marka')->get();
$model = DB::table('avto_model')->get();
$avto_type_model = DB::table('avto_type_model')->get();
$avto_type_spare = DB::table('type_of_spare')->get();


?>

@extends('layout')

@section('main_content')
         <h2>Панель администратора</h2>
        <p>Удаление/добавление новых запчастей в каталог магазина</p>

        <div class="container">
            <form action="{{route('user.admin')}}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="typeOfSpare">Тип запчасти</label> <br>
                <select name="typeOfSpare" id="typeOfSpare">
                    @foreach($type_of_spare as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select> <br>

                <label for="type">Категория запчасти</label> <br>
                <select name="type" id="type">
                    @foreach($avto_type_spare as $typeSpare)
                        <option value="{{$typeSpare->id}}">{{$typeSpare->name}}</option>
                    @endforeach
                </select>


                <br>

                <label for="markaAvto">Марка автомобиля</label> <br>
                <select name="markaAvto" id="markaAvto" >
                    @foreach($marka as $mark)
                        <option value="{{$mark->id}}">{{$mark->name}}</option>
                    @endforeach
                </select>

                <br>

                <label for="modelAvto">Выберите модель</label> <br>
                <select class="js-select2" name="modelAvto" id="modelAvto" placeholder="Выберите модель">
                    <option value=""></option>
                    @foreach($model as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                    @endforeach
                </select> <br>

                <select class="js-select2" name="typeAvto" id="typeAvto" placeholder="Выберите тип модели">
                    <option value=""></option>
                    @foreach($avto_type_model as $type_avto)
                        <option value="{{$type_avto->id}}">{{$type_avto->type_model}}</option>
                    @endforeach
                </select> <br>

                <input type="text" name="nameOfSpare" placeholder="Введите название"> <br>

                <input type="text" name="description" placeholder="Краткое описание"> <br>

                <input type="text" name="price" placeholder="Введите цену"> <br>

                <input type="text" name="articul" placeholder="Введите артикул товара">

                <input type="file" name="linkToFile" onchange="document.getElementById('hidden_file').value=this.value;">

                <input type="hidden" id="hidden_file" name="hidden" value="">

                <button type="submit" name="spareBtn">add</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('.js-select2').select2({

                placeholder: "Выберите модель",

                maximumSelectionLength: 5,

                language: "ru"

            });

        });
    </script>
@endsection
