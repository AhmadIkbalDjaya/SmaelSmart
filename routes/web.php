<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/calender', function () {
    return view('calender');
})->middleware('admin');

Route::get('/raport', function () {
    return view('raport');
})->middleware('teacher');

Route::get('/control-card', function () {
    return view('control-card');
});

Route::get('/lesson', function () {
    return view('lesson');
});