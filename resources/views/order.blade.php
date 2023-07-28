<?php

$spare = DB::table('avto_spare')->where('id', $_GET['detailId'])->first();

?>

@extends('layout')

@section('main_content')
    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h4 class="mb-3">Оформление заказа :</h4>
                <div class="order-block">
                    <table class="table order-list">
                        <thead id="table-head-list">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Название</th>
                            <th scope="col">Цена</th>
                        </tr>
                        </thead>
                        <tbody id="table-head-list">
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$spare->name}}</td>
                            <td>{{$spare->price}}₽</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="needs-validation"  method="post" action="{{route('user.order')}}">

                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Телефон</label>
                            <input name="phone" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Введите номер телефона!
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">ФИО</label>
                            <input name="userInfo" type="text" class="form-control" id="userInfo" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Введите своё ФИО!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Комментарий к заказу</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"></span>
                                <input name="comment" type="text" class="form-control" id="username" placeholder="Комментарий"
                                       required="">
                                <div class="invalid-feedback">
                                    Введите комментарий
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span
                                    class="text-body-secondary">(Optional)</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="type-deliver">
                                <div>Способ доставки:</div>
                                <input class="form-control " id="input-myself-deliver" type="text"
                                       placeholder="Самовывоз" readonly>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="type-deliver">
                                <div>Адрес:</div>
                                <input class="form-control " id="input-myself-deliver" type="text"
                                       placeholder="Адмирала Нахимова, 233а/2" readonly>
                            </div>
                        </div>
                        <hr class="my-4">

                        <div class="alert alert-warning" role="alert">
                            К оплате:  {{$spare->price}}₽
                        </div>

                        <input type="hidden" name="priceOrder" value="{{$spare->price}}">
                        <input type="hidden" name="spareId" value="{{$spare->id}}">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Сделать заказ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
