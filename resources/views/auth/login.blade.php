@extends('layouts.base')

@section('main')
    <main class="bg-dark bg-gradient d-flex align-items-center w-100">
        <div class="container-xxl align-content-center">
            <div class="row">
                <div class="form_sign mx-auto p-4 rounded-3">
                    <form action="" method="post">
                        @csrf
                        <legend class="text-center fw-bolder">Вход</legend>
                        <p class="text-center">Ещё не зарегистрированы? <a href="{{route('getRegister')}}">Регистрация</a></p>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="mb-3">
                            <label for="email_field" class="form-label">Еmail</label>
                            <input type="email" id="email_field" class="form-control"  name="email" value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password_field" class="form-label">Пароль</label>
                            <input type="text" id="password_field" class="form-control"  name="password">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="remember_me">Запомнить меня</label>
                            <input class="form-check-input" type="checkbox" value="true" id="remember_me" name="remember">
                        </div>
                        <input type="submit" class="btn btn-success bg-gradient mt-3 w-100" value="Вход">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
