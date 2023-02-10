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
Route::controller(LoginController::class)->group(function () {
  Route::get('/login', 'index')->name('login')->middleware('guest');
  Route::post('/login', 'authenticate');
  Route::post('/logout', 'logout')->middleware('auth');
});
// Calendar
Route::get('/calender', [CalenderController::class, 'index'])->middleware('auth');
// Raport
Route::controller(RaportController::class)->group(function () {
  Route::get('/studentRaport', 'studentRaport')->middleware('student');
  Route::get('/inputScore', 'inputScore')->middleware('teacher');
  Route::get('/inputScore/{course}/edit', 'inputScoreEdit')->middleware('teacher');
  Route::post('/inputScore/{course}/{score}', 'inputScoreUpdate')->middleware('teacher');
});
// Control Card
Route::controller(ControlCardController::class)->group(function () {
  Route::get('/controlCard', 'index')->middleware('student');
  Route::get('/inputControlCard', 'inputControlCard')->middleware('teacher');
  Route::get('/inputControlCard/{course}/edit', 'inputControlCardEdit')->middleware('teacher');
  Route::post('/inputControlCard/{course}/{controlCard}', 'inputControlCardUpdate')->middleware('teacher');
});
Route::get('/userCourse/{course}', [CourseController::class, 'userCourse'])->middleware('auth');
// material
Route::resource('userCourse/{course}/material', CourseMaterialController::class)->middleware('auth');
// course for admin
Route::resource('/course', CourseController::class)->middleware('admin');
// user
Route::get('/profile/{user}', [UserController::class, 'profile'])->middleware('auth');
Route::resource('/user', UserController::class)->middleware('admin');
// announcement
Route::resource('/announcement', AnnouncementController::class)->middleware('admin');
// task
Route::resource('/userCourse/{course}/task', TaskController::class)->middleware('auth');