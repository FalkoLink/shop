@extends('layouts.base')

@section('main')
    <main class="bg-dark bg-gradient d-flex align-items-center w-100">
        <div class="container-xxl align-content-center">
            <div class="row">
                <div class="form_sign mx-auto my-3 p-4 rounded-3">
                    <form action="/user" method="post">
                        @csrf
                        <legend class="text-center fw-bolder">Регистрация</legend>
                        <p class="text-center">уже зарегистрированы? <a href="{{route('getLogin')}}">Вход</a></p>
                        <hr>
                        <div class="mb-3">
                            <label for="name_field" class="form-label">Ф.И.О <span class="text-danger">*</span></label>
                            <input type="text" id="name_field" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="0">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="1">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        @error('gender')
                        <span class="text-danger" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                        @enderror
                        <div class="mb-3">
                            <label for="email_field" class="form-label">Еmail <span class="text-danger">*</span></label>
                            <input type="email" id="email_field" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="number_field" class="form-label">Номер телефона</label>
                            <input type="text" id="number_field" class="form-control @error('number') is-invalid @enderror" name="number" value="{{old('number')}}">
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Дата Рождения <span class="text-danger">*</span></label>
                            <input type="date" id="birthday" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{old('birthday')}}">
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_field" class="form-label">Пароль <span class="text-danger">*</span></label>
                            <input type="password" id="password_field" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rpassword_field" class="form-label">Повторите пароль <span class="text-danger">*</span></label>
                            <input type="password" id="rpassword_field" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                        </div>
                        <input type="submit" class="btn btn-success bg-gradient mt-3 w-100" value="Зарегистрироваться">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
