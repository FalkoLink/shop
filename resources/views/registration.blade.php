@extends('layouts.base')

@section('main')
    <main class="bg-dark bg-gradient d-flex align-items-center w-100">
        <div class="container-xxl align-content-center">
            <div class="row">
                <div class="form_sign mx-auto mt-3 p-4 rounded-3">
                    <form action="" method="post">
                        <legend class="text-center fw-bolder">Регистрация</legend>
                        <p class="text-center">уже зарегистрированы? <a href="{{route('sign_in')}}">Вход</a></p>
                        <hr>
                        <div class="mb-3">
                            <label for="fname_fild" class="form-label">Имя</label>
                            <input type="text" id="fname_fild" class="form-control" name="fname">
                        </div>
                        <div class="mb-3">
                            <label for="lname_fild" class="form-label">Фамилие</label>
                            <input type="text" id="lname_fild" class="form-control" name="lname">
                        </div>
                        <div class="mb-3">
                            <label for="email_fild" class="form-label">Еmail</label>
                            <input type="email" id="email_fild" class="form-control"  name="email">
                        </div>
                        <div class="mb-3">
                            <label for="number_fild" class="form-label">Номер</label>
                            <input type="text" id="number_fild" class="form-control" name="number">
                        </div>
                        <div class="mb-3">
                            <label for="password_fild" class="form-label">Пароль</label>
                            <input type="text" id="password_fild" class="form-control"  name="password">
                        </div>
                        <div class="mb-3">
                            <label for="rpassword_fild" class="form-label">Повторите пароль</label>
                            <input type="text" id="rpassword_fild" class="form-control" name="rpassword">
                        </div>
                        <input type="submit" class="btn btn-success bg-gradient mt-3 w-100" value="Зарегистрироваться">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
