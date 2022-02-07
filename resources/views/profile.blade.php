@extends('layouts.base')

@section('main')
    <main>
        <div class="d-flex">
            <div id="profile_sidebar" class="col-3 bg-dark text-light fs-4 ">
                <div class="text-center py-4">
                <a class="fw-bolder fs-2" href="{{route('home')}}"><i class="icon-shop"></i><span class="text-danger">HOT</span>SHOP</a>
                </div>
                <hr>
                <div class="fw-bolder">
                    <ul class="list-unstyled">
                        <li class="active"><a href="#">Профиль</a></li>
                        <li><a href="#">Заказы</a></li>
                        <li><a href="#">Избраное</a></li>
                        <li><a href="#">Выйти</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">

            </div>
        </div>
    </main>
@endsection
