<?php

$detail = DB::table('avto_spare')->where('id', $_GET['spareId'])->first();

?>

@extends('layout')

<a href="/">Вернуться</a>

@section('main_content')
    <div class="container">
        <div class="spare-block">
            <div class="content row" id="contentSpare">
                <div class="block-content-spare col-sm-8">
                    <h4>{{$detail->name}}</h4>
                    <h4>{{$detail->price}}₽</h4> <br>
                    <div class="linkToOrder">
                        <a href="{{route('user.order')}}?detailId={{$detail->id}}" class="orderBtn">Заказать</a>
                    </div>
                    <div class="linkPhoneWindow">
                        <a href="#showPhone">Показать телефон</a>
                    </div>
                    <div class="showPhone" id="showPhone">
                        <div class="window">
                            <p>79171980336</p>
                            <a href="#" class="close">закрыть окно</a>
                        </div>
                    </div>
                    <div class="description-spare">
                        Описание товара: {{$detail->description}}
                    </div>
                </div>
                <div class="block-content-spare col-sm-4">
                    <div class="image-block">
                        <img class="img-fluid mx-auto d-block" src="/img/{{$detail->image_link}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
