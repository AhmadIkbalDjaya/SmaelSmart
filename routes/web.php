<?php

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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/calender', function () {
    return view('calender');
});

Route::get('/raport', function () {
    return view('raport');
});

Route::get('/control-card', function () {
    return view('control-card');
});

Route::get('/lesson', function () {
    return view('lesson');
});