<nav class="navbar d-none d-md-block navbar-expand navbar-dark bg-dark py-0">
    <div class="container-xxl">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="#">Доставка и оплата</a></li>
            <li class="nav-item"><a class="nav-link" href="#">О нас</a></li>
            <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
        </ul>
        <ul class="navbar-nav me-5">
            <li class="nav-item text-light p-2">+998712022021</li>
            <li class="nav-item"><a class="nav-link" href="#">Поддержка</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="language" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Язык
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="language">
                    <li><a class="dropdown-item" href="#">RU</a></li>
                    <li><a class="dropdown-item" href="#">EN</a></li>
                    <li><a class="dropdown-item" href="#">JP</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand navbar-dark bg-dark py-0" id="navbar_">
    <div class="container-xxl">
        <div class="col-md-2 d-flex">
            <a class="navbar-brand fw-bolder" href="{{route('home')}}"><i class="icon-shop"></i><span class="text-danger">HOT</span>SHOP</a>
            <a class="btn btn-outline-light my-2" data-bs-toggle="offcanvas" href="#categories" role="button" aria-controls="offcanvasExample">
                Категории
            </a>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="categories" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header bg-dark text-light">
                <h2 class="offcanvas-title fw-bolder" id="offcanvasLabel">Категории</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            </div>
            <div class="offcanvas-body">
                @php
                    $cats_nav = App\Models\Category::where('parent_id', 1)->get();
                @endphp
                @foreach($cats_nav as $cats)
                    <h5 class="p-2 mt-3 fs-4 fw-bolder"><a href="{{route('categories',[$cats->slug])}}">{{$cats->name}}</a></h5>
                    <div class="ps-3">
                        <div class="accordion" id="accordion{{$loop->index}}">
                            @foreach($cats->children as $child)
                                <div class="accordion-item shadow">
                                    <h2 class="accordion-header" id="flush-heading{{$loop->parent->index . $loop->index}}">
                                        <button class="accordion-button fs-5 bg-gradient @if(isset($category)) @if($category->parent != $child) collapsed @endif @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$loop->parent->index . $loop->index}}" aria-expanded="@if(isset($category)) @if($category->parent == $child) true @endif @else false @endif" aria-controls="flush-collapse{{$loop->parent->index . $loop->index}}">
                                            {{$child->name}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{$loop->parent->index . $loop->index}}" class="accordion-collapse pb-4 collapse @isset($category) @if($category->parent == $child) show @endif @endisset" aria-labelledby="flush-heading{{$loop->parent->index . $loop->index}}" data-bs-parent="#accordion{{$loop->parent->index}}">
                                        <div class="list-group list-group-flush">
                                            @foreach($child->children as $cat)
                                                <a href="{{route('category',[$cats->slug,$cat->slug])}}" class="list-group-item @isset($category) @if($category->slug == $cat->slug) active @endif @endisset">{{$cat->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-none d-md-flex col-8 col-lg-9">
            <form class="d-flex ms-5 my-3 w-100" method="get">
                <input class="form-control rounded-pill" type="search" placeholder="Search" aria-label="Search">
                <button type="submit"><i class="icon-search-1"></i></button>
            </form>
            <ul class="navbar-nav text-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="sign_in" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-user-circle-o"></i><br>Войти</a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="sign_in">
                        @guest()
                            <li><a class="dropdown-item" href="{{route('getLogin')}}">Войти</a></li>
                            <li><a class="dropdown-item" href="{{route('getRegister')}}">Регистрация</a></li>
                        @endguest
                        @auth()
                            <li><a class="dropdown-item" href="#">Кабинет</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                        @endauth
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="icon-heart-empty"></i><br>Избранное</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="icon-basket"></i><br>Корзина</a></li>
            </ul>
        </div>
        <a class="btn btn-outline-light me-2 d-md-none" data-bs-toggle="offcanvas" href="#menu_" role="button" aria-controls="menu_">
            Меню
        </a>
        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="menu_" aria-labelledby="menu_title">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light fw-bolder" id="menu_title"><i class="icon-shop"></i>SHOP</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-around text-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="sign_in" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-user-circle-o"></i><br>Войти</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="sign_in">
                            @guest()
                                <li><a class="dropdown-item" href="{{route('getLogin')}}">Войти</a></li>
                                <li><a class="dropdown-item" href="{{route('getRegister')}}">Регистрация</a></li>
                            @endguest
                            @auth()
                                <li><a class="dropdown-item" href="#">Кабинет</a></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                            @endauth
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-heart-empty"></i><br>Избранное</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-basket"></i><br>Корзина</a></li>
                </ul>
                <form class="d-flex my-3 w-100">
                    <input class="form-control rounded-pill ms-3" type="search" placeholder="Search" aria-label="Search">
                    <button type="submit"><i class="icon-search-1"></i></button>
                </form>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="#">Доставка и оплата</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Поддержка</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">О нас</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="language" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Язык
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="language">
                            <li><a class="dropdown-item" href="#">RU</a></li>
                            <li><a class="dropdown-item" href="#">EN</a></li>
                            <li><a class="dropdown-item" href="#">JP</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <ul class="navbar-nav justify-content-between">
                <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                <li class="nav-item text-light p-2">+998712022021</li>
            </ul>
        </div>
    </div>
</nav>
<div id="inane" class="d-none"></div>
