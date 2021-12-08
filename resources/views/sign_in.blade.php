@extends('layouts.base')

@section('main')
    <main class="bg-dark bg-gradient d-flex align-items-center w-100">
        <div class="container-xxl align-content-center">
            <div class="row">
                <div class="form_sign mx-auto p-4 rounded-3">
                    <form action="" method="post">
                        <legend class="text-center fw-bolder">Вход</legend>
                        <p class="text-center">Ещё не зарегистрированы? <a href="{{route('registration')}}">Регистрация</a></p>
                        <hr>
                        <div class="mb-3">
                            <label for="email_fild" class="form-label">Еmail</label>
                            <input type="email" id="email_fild" class="form-control"  name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password_fild" class="form-label">Пароль</label>
                            <input type="text" id="password_fild" class="form-control"  name="password">
                        </div>
                        <input type="submit" class="btn btn-success bg-gradient mt-3 w-100" value="Вход">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
