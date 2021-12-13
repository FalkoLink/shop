<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');


Route::resource('user', UserController::class)->only([
    'store'
]);
Route::namespace('App\Http\Controllers\Auth')->group(function (){
    Route::middleware('guest')->group(function (){
        Route::get('/register','AuthController@getRegister')->name('getRegister');
        Route::post('/login','AuthController@postLogin')->name('postLogin');
        Route::get('/login','AuthController@getLogin')->name('getLogin');
    });
    Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

});




