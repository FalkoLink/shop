<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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

Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::prefix('/categories')->group(function(){
    Route::get('/{section}','App\Http\Controllers\HomeController@categories')
        ->name('categories')
        ->where('section','(male|female)');

    Route::get('/{section}/{category}','App\Http\Controllers\HomeController@category')
        ->name('category')
        ->where('section','(male|female)');

    Route::get('/{section}/{category}/{product}','App\Http\Controllers\HomeController@product')
        ->name('product')
        ->where('section','(male|female)');
});

Route::prefix('/profile')->group(function (){
    Route::get('/', function (){
        return view('profile');
    });
});






Route::get('/test', function (){
    $cat = Category::with('attributes')->get()->find(2);
    $prod = Product::findOrFail(3);
    $attributes = $cat -> attributes()->get();
    $charac = array();
    foreach($attributes as $attribute){
        $charac[$attribute->title] = $prod->values()->where('attribute_id',$attribute->id)->get();
    }
    return view('test',compact('cat','prod','charac'));
});








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
