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
        <div class="col-sm-5 mx-auto">
            <form class="form-admin" action="{{route('user.admin')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="typeOfSpare">Тип запчасти</label>
                    <select name="typeOfSpare" id="typeOfSpare">
                        @foreach($type_of_spare as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type">Категория запчасти</label>
                    <select name="type" id="type">
                        @foreach($avto_type_spare as $typeSpare)
                            <option value="{{$typeSpare->id}}">{{$typeSpare->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="markaAvto">Марка автомобиля</label>
                    <select name="markaAvto" id="markaAvto">
                        @foreach($marka as $mark)
                            <option value="{{$mark->id}}">{{$mark->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="modelAvto">Выберите модель</label>
                    <select class="js-select2" name="modelAvto" id="modelAvto" placeholder="">
                        @foreach($model as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="typeAvto">Выберите тип модели</label>
                    <select class="js-select2" name="typeAvto" id="typeAvto" placeholder="">
                        @foreach($avto_type_model as $type_avto)
                            <option value="{{$type_avto->id}}">{{$type_avto->type_model}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="spare-alone-inputs">
                    <div class="input-block">
                        <input type="text" name="nameOfSpare" placeholder="Введите название">
                    </div>
                    <div class="input-block">
                        <input type="text" name="description" placeholder="Краткое описание">
                    </div>
                    <div class="input-block">
                        <input type="text" name="price" placeholder="Введите цену">
                    </div>
                    <div class="input-block">
                        <input type="text" name="articul" placeholder="Введите артикул товара">
                    </div>
                </div>

                <label for="linkToFile">Загрузите основную фотографию</label>
                <input type="file" name="linkToFile">

                <button type="submit" name="spareBtn" class="btn btn-success">Добавить запчасть</button>
            </form>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {

            $('.js-select2').select2({

                placeholder: "Выберите модель",

                maximumSelectionLength: 5,

                language: "ru"

            });

        });
    </script>
@endsection
