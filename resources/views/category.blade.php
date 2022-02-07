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
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                    @if(isset($category))
                        <li class="breadcrumb-item"><a href="{{route('categories',[$section->slug])}}">{{$section->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                    @else
                        <li class="breadcrumb-item active">{{$section->name}}</li>
                    @endif
                </ol>
            </nav>
            <div class="d-flex row">
                <aside class="col-3 d-none d-md-block shadow pt-3 rounded-2">
                        <h4 class="fw-bolder"><a href="{{route('categories',[$section->slug])}}">{{$section->name}}</a></h4>
                        <div class="pb-5">
                            <div class="accordion" id="accordion{{$section->id}}">
                                @foreach($section->children as $cats)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading{{$cats->id . $loop->index}}">
                                            <button class="accordion-button fs-5 bg-gradient @if(isset($category)) @if($category->parent != $cats) collapsed @endif @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$cats->id . $loop->index}}" aria-expanded="@if(isset($category)) @if($category->parent == $cats) true @endif @else false @endif" aria-controls="flush-collapse{{$cats->id . $loop->index}}">
                                                {{$cats->name}}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{$cats->id . $loop->index}}" class="accordion-collapse pb-2 collapse @isset($category) @if($category->parent == $cats) show @endif @endisset" aria-labelledby="flush-heading{{$cats->id . $loop->index}}" data-bs-parent="#accordion{{$section->id}}">
                                            <div class="list-group list-group-flush">
                                                @foreach($cats->children as $cat)
                                                    <a href="{{route('category',[$section->slug,$cat->slug])}}" class="list-group-item @isset($category) @if($category->slug == $cat->slug) active @endif @endisset">{{$cat->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    <form action="">
                        <h4 class="fw-bold">Цена</h4>
                        <div class="input-group mb-3">
                            <span class="input-group-text">От</span>
                            <input type="text" class="form-control" placeholder="0" aria-label="from">
                            <span class="input-group-text">До</span>
                            <input type="text" class="form-control" placeholder="1000" aria-label="to">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" value="" id="discount">
                            <label class="form-check-label" for="discount">
                                Со скидкой?
                            </label>
                        </div>
                        <div classs="">

                        </div>
                    </form>
                </aside>
                <div class="col-md-9 row">
                    <div class="col-12 mb-3">
                        <div class="dropdown me-3">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                                Новое
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownSort">
                                <li><a class="dropdown-item" href="#">Новое</a></li>
                                <li><a class="dropdown-item" href="#">Последнее</a></li>
                                <li><a class="dropdown-item" href="#">Рекомендуемое</a></li>
                                <li><a class="dropdown-item" href="#">Цена по убыванию</a></li>
                                <li><a class="dropdown-item" href="#">Цена по возрастанию</a></li>
                            </ul>
                        </div>
                    </div>
                    @foreach($products as $prod)
                        <div class="col-lg-3 col-6">
                            <div class="shadow-lg p-2 rounded-3 my-3">
                                <div class="position-relative">
                                    <a href="{{route('product',[$section->slug, $prod->category->slug, $prod->slug])}}"><img src="https://m.media-amazon.com/images/I/81Sv3Z2suBL._AC_UL1500_.jpg" class="img-fluid rounded-3" alt=""></a>
                                    <a href="#" class="fs-4 text-danger heart"><i class="icon-heart-empty"></i></a>
                                </div>
                                @if(!is_null($prod->discount))
                                    <p class="d-flex align-items-end"><span class="fw-bolder fs-4">{{$prod->discount}}$</span><span class="fw-bold ms-2 me-auto fs-5 text-secondary strikeout">{{$prod->price}}$</span><span class="text-danger fw-bolder fst-italic">{{round(($prod->price - $prod->discount)*100/$prod->price, 1)}}%</span></p>
                                @else
                                    <p class="d-flex align-items-end"><span class="fw-bolder fs-4">{{$prod->price}}$</span></p>
                                @endif
                                <h4 class="fw-bold"><a href="{{route('product',[$section->slug, $prod->category->slug, $prod->slug])}}" class="link-dark">{{$prod->name}}</a></h4>
                                <p><a href="{{route('category',[$section->slug, $prod->category->slug])}}" class="text-decoration-underline text-primary">{{$prod->category->name}}</a></p>
                                <p class="text-danger text-center my-2">
                                    @for($i=$prod->getRating();$i>=1;$i--)
                                        <i class="icon-star"></i>
                                    @endfor
                                    @if(!is_int($i))
                                        <i class="icon-star-half-alt"></i>
                                    @endif
                                    @for($i= 5 - $prod->getRating();$i>=1;$i--)
                                        <i class="icon-star-empty"></i>
                                    @endfor
                                    <span class="text-secondary fw-bold ms-2">{{count($prod->rating)}}<i class="icon-user"></i></span>
                                <p>
                                <a href="#" class="btn btn-success w-100">Добавить в Карзину</a>
                            </div>
                        </div>
                    @endforeach
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
@endsection
