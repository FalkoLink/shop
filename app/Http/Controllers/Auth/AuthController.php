<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Login $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        $remember = $request->input('remember');
        if(Auth::attempt(['email'=> $email, 'password' => $pass], $remember)){
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }else{
            return back()->withErrors(['error' => 'Email или Пароль неверный']);
        }
    }
    public function getLogin(){
        return view('auth.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
