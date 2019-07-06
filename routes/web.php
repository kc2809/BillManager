<?php

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
    
use App\Http\Controllers\DB;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('foo', function() {
    return "hello laravel";
});

Route::get('user/{name}', function ($name) {
    //
    return "hello " . $name;
})->where('name', '[A-Za-z]+');

Route::get('/xin', 'MyController@XinChao');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/unauthorization', function() {
    return view('auth/unauthorization');
})->name('unauthorization');
