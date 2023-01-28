<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ControlCardController;
use App\Http\Controllers\CourseMaterialController;

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

// Route::get('/', function () {
//     return view('home');
// })->middleware('auth');
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/calender', [CalenderController::class, 'index'])->middleware('auth');

Route::get('/raport', [RaportController::class, 'index'])->middleware('auth');

Route::get('/control-card', [ControlCardController::class, 'index'])->middleware('auth');

// Route::get('/course', function () {
//     return view('course');
// });
Route::get('/course/{course}', [CourseController::class, 'show'])->middleware('auth');

Route::get('/profile/{user:username}', [UserController::class, 'profile'])->middleware('auth');
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/courseMaterial/{coursematerial}', [CourseMaterialController::class, '']);
Route::get('/courseMaterial/add/{course}', [CourseMaterialController::class, 'create']);
Route::post('/courseMaterial/add', [CourseMaterialController::class, 'store']);
Route::get('/courseMaterial/{courseMaterial}', [CourseMaterialController::class, 'show']);
Route::delete('/courseMaterial/{courseMaterial}', [CourseMaterialController::class, 'destroy']);

Route::get('/user/add', [UserController::class, 'create']);
Route::post('/user/add', [UserController::class, 'store']);