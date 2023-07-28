<?php

$type_of_spare = DB::table('avto_type')->get();
$marka = DB::table('avto_marka')->get();
$model = DB::table('avto_model')->get();
$avto_type_model = DB::table('avto_type_model')->get();
$avto_type_spare = DB::table('type_of_spare')->get();
$orders = DB::table('avto_order')->get();

?>

@extends('layout')

@section('main_content')
    <div class="container">
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
                        <select class="js-select2" name="markaAvto" id="markaAvto">
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
                            <input type="text" name="nameOfSpare" maxlength="100" placeholder="Введите название">
                        </div>
                        <div class="input-block">
                            <input type="text" name="description" maxlength="200" placeholder="Краткое описание">
                        </div>
                        <div class="input-block">
                            <input type="text" name="price" maxlength="15" placeholder="Введите цену">
                        </div>
                        <div class="input-block">
                            <input type="text" name="articul" maxlength="20" placeholder="Введите артикул товара">
                        </div>
                    </div>

                    <label for="linkToFile">Загрузите основную фотографию</label>
                    <input type="file" name="linkToFile">

                    <button type="submit" name="spareBtn" class="btn btn-success">Добавить запчасть</button>
                </form>
            </div>
            <div class="col-sm-5 mx-auto">
                <div class="container py-2">
                    <form class="form-admin" action="{{route('user.admin')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <p>Если не нашли нужную модель добавьте ее сами!</p>

                        <div class="mb-3">
                            <label for="markaAvtoForModel">Марка автомобиля</label>
                            <select class="js-select2" name="markaAvtoForModel" id="markaAvto">
                                @foreach($marka as $mark)
                                    <option value="{{$mark->id}}">{{$mark->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <input type="text" name="addNewModel" maxlength="20" placeholder="Введите модель">

                        <input type="text" name="dateOfRelease" maxlength="20" placeholder="Год выпуска">

                        <button type="submit" name="addNewElementModel" class="btn btn-success">Добавить модель</button>
                    </form>
                </div>
                <div class="container py-3">
                    <form class="form-admin" action="{{route('user.admin')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <p>Если не нашли нужный тип модели, добавьте его сами!</p>
                        <div class="mb-3">
                            <label for="markaAvtoForType">Марка автомобиля</label>
                            <select class="js-select2" name="markaAvtoForType" id="markaAvtoForType">
                                @foreach($marka as $mark)
                                    <option value="{{$mark->id}}">{{$mark->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="modelAvtoForType">Выберите модель</label>
                            <select class="js-select2" name="modelAvtoForType" id="modelAvtoForType" placeholder="">
                                {{$model = DB::table('avto_model')->get()}}
                                @foreach($model as $model)
                                    <option value="{{$model->id}}">{{$model->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="addNewModelType" maxlength="20" placeholder="Введите тип модели">
                        <button type="submit" name="addNewElementType" class="btn btn-success">Добавить тип модели
                        </button>
                    </form>
                </div>

            </div>
            <hr>
            <div class="py-3">
                <h5>Текущие заказы:</h5>
                <table class="table" style="text-align: center">
                    <thead id="table-head-list">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody id="table-head-list">
                    @foreach($orders as $order)
                        <tr class="table-warning">
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->userInfo}}</td>
                            <td>
                                <a href="{{route('user.deleteOrder')}}?orderId={{$order->id}}&spareId={{$order->spare_id}}">
                                    <button name="btnDelete" type="button" class="btn btn-success">Удалить заказ
                                    </button>
                                </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
    </div>

@endsection
