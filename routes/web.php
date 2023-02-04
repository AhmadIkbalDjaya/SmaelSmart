<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ControlCardController;
use App\Http\Controllers\AnnouncementController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/calender', [CalenderController::class, 'index'])->middleware('auth');

Route::get('/studentRaport', [RaportController::class, 'studentRaport'])->middleware('student');
Route::get('/inputScore', [RaportController::class, 'inputScore'])->middleware('teacher');
Route::get('/inputScore/{course}/edit', [RaportController::class, 'inputScoreEdit'])->middleware('teacher');
Route::post('/inputScore/{course}/{score}', [RaportController::class, 'inputScoreUpdate'])->middleware('teacher');

Route::get('/controlCard', [ControlCardController::class, 'index'])->middleware('student');
Route::get('/inputControlCard', [ControlCardController::class, 'inputControlCard'])->middleware('teacher');
Route::get('/inputControlCard/{course}/edit', [ControlCardController::class, 'inputControlCardEdit'])->middleware('teacher');
Route::post('/inputControlCard/{course}/{controlCard}', [ControlCardController::class, 'inputControlCardUpdate'])->middleware('teacher');

Route::get('/userCourse/{course}', [CourseController::class, 'userCourse'])->middleware('auth');

Route::get('/profile/{user:username}', [UserController::class, 'profile'])->middleware('auth');

// material
Route::resource('userCourse/{course}/material', CourseMaterialController::class);

// course for admin
Route::resource('/course', CourseController::class)->middleware('admin');

// user
Route::get('/user', [UserController::class, 'index'])->middleware('admin');
Route::post('/user/update', [UserController::class, 'update'])->middleware('admin');
Route::get('/user/add', [UserController::class, 'create'])->middleware('admin');
Route::post('/user/add', [UserController::class, 'store']);
Route::get('/user/{user:username}', [UserController::class, 'show'])->middleware('admin');
Route::get('/user/edit/{user:username}', [UserController::class, 'edit'])->middleware('admin');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->middleware('admin');

// announcement
Route::resource('/announcement', AnnouncementController::class)->middleware('admin');
// task
Route::resource('/userCourse/{course}/task', TaskController::class)->middleware('auth');