@extends('layouts.base')

@section('title', 'Category')

@section('header')
    <header>
        @include('layouts.navbar')
    </header>
@endsection

@section('main')
    <main>
        <div class="container-xxl">
            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="me-auto my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories',[$section->slug])}}">{{$section->name}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('category',[$section->slug,$category->slug])}}">{{$category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product name</li>
                </ol>
            </nav>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="box-photos">
                        <div class="row">
                            <div class="col-3">
                                <div class="mini_photo"><img src="https://m.media-amazon.com/images/I/81Sv3Z2suBL._AC_UL1500_.jpg" class="img-fluid" onmouseover="expandPhoto(this);"  alt=""></div>
                                <div class="mini_photo"><img src=" https://m.media-amazon.com/images/I/91cl-E79PtL._AC_UX679_.jpg" class="img-fluid" onmouseover="expandPhoto(this);"  alt=""></div>
                                <div class="mini_photo"><img src="https://m.media-amazon.com/images/I/81Sv3Z2suBL._AC_UL1500_.jpg" class="img-fluid" onmouseover="expandPhoto(this);"  alt=""></div>
                                <div class="mini_photo"><img src="https://m.media-amazon.com/images/I/81Sv3Z2suBL._AC_UL1500_.jpg" class="img-fluid" onmouseover="expandPhoto(this);"  alt=""></div>
                                <div class="mini_photo"><img src="https://m.media-amazon.com/images/I/81Sv3Z2suBL._AC_UL1500_.jpg" class="img-fluid" onmouseover="expandPhoto(this);"  alt=""></div>
                            </div>
                            <div class="col-9">
                                <div>
                                    <img id="expandedImg" class="img-fluid" alt="" src="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-7">
                    <h3 class="fw-bold">Название товара</h3>
                    <p class="text-danger text-start my-2">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <span class="text-secondary ms-3 fw-bold">100 Оценок</span>
                        |
                        <span class="text-secondary fw-bold">5 Комментариев</span>
                    </p>
                    <p>Цена: <span class="fs-5">200$</span><span class="ms-2 text-secondary strikeout">300$</span></p>
                    <p>Скидка: <span class="text-danger fw-bolder fst-italic"> 33%</span></p>
                    <p>Категория: <a href="#"> Кофта </a></p>
                    <p>Раздел: <a href="#">Мужская одежда</a></p>
                    <p>Бренд: <a href="#">Lacoste</a></p>

                    <p>В наличии: <span class="text-success fw-bolder fst-italic"> 25 </span> шт</p>
                    <hr>
                    <h4>Описание товара: </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias asperiores eum excepturi labore, molestias quibusdam tempore. Accusantium animi aut, culpa eveniet laboriosam libero placeat repellat temporibus! Hic, iure, officia!</p>
                </div>
                <div class="col-md-3 col-5">
                    <div class="rounded-3 overflow-hidden border shadow">
                        <div class="bg-dark">
                            <h4 class="fw-bold text-light p-3">Заказать</h4>
                        </div>
                        <div class="p-3">
                            <form id="product_form" action="#">
                                <h5>Цвет: <span id="color"></span></h5>
                                <div id="colors_select" class="d-flex flex-wrap mb-4">
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary m-2" onclick="select('color1', this)"></div>
                                        <input id="color1" class="form-check-input invisible" value="red" type="radio" name="color_product" required>
                                    </div>
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary m-2" onclick="select('color2', this)"></div>
                                        <input id="color2" class="form-check-input invisible" value="blue" type="radio" name="color_product">
                                    </div>
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary m-2" onclick="select('color3', this)"></div>
                                        <input id="color3" class="form-check-input invisible" value="green" type="radio" name="color_product">
                                    </div>
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary m-2" onclick="select('color4', this)"></div>
                                        <input id="color4" class="form-check-input invisible" value="black" type="radio" name="color_product">
                                    </div>
                                </div>
                                <div class="d-flex my-3 align-items-center">
                                    <h5 class="d-inline-block me-3">Размер: </h5>
                                    <div class="box_input">
                                        <select class="form-select" name="size[]" aria-label="size">
                                            <option value="22">22 sm</option>
                                            <option value="23">23 sm</option>
                                            <option value="24">24 sm</option>
                                            <option value="25">25 sm</option>
                                            <option value="26">26 sm</option>
                                            <option value="27">27 sm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex my-3 align-items-center">
                                    <h5 class="d-inline-block me-3">Количество: </h5>
                                    <div class="box_input">
                                        <input id="count" type="number" class="form-control" value="1" max="3" min="1" required>
                                    </div>
                                </div>
                                <h5>Общая сумма: <span id="total_cost"></span>$</h5>
                                <input type="submit" class="btn btn-success w-100 mt-4 bg-gradient" value="Добавить в карзину">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    <script src="/js/mainJS.js"></script>
    <script type="text/javascript">
        //Img slider
        let expandImg = document.getElementById("expandedImg");

        function expandPhoto(img) {
            expandImg.src = img.src;
        }

        //color select
        let color = document.getElementById("color");

        function select(col, sel){
            let select = document.getElementById(col);
            let selected = document.querySelector(".color_select");

            select.checked = true;
            color.innerHTML = select.value;

            if(selected){
                selected.classList.remove("color_select");
            }
            sel.classList.add("color_select");
        }

        //total cost
        let total = document.getElementById("total_cost");
        let count = document.getElementById("count");
        let cost = 200;

        total.innerHTML = cost * count.value;
        count.addEventListener("change", function (){
            total.innerHTML = cost * count.value;
        })

    </script>
@endsection
