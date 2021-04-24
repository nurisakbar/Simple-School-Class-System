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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/teacher-login', [App\Http\Controllers\TeacherAuthController::class, 'index'])->name('teacher.loginform');
Route::post('/teacher-login', [App\Http\Controllers\TeacherAuthController::class, 'login'])->name('teacher.loginform');
Route::get('/teacher-login', [App\Http\Controllers\TeacherAuthController::class, 'index'])->name('teacher.loginform');
Route::get('/teacher-dashboard', [App\Http\Controllers\TeacherController::class, 'dashboard'])->name('teacher.dashboard');
Route::resource('student', App\Http\Controllers\StudentController::class);
Route::resource('teacher', App\Http\Controllers\TeacherController::class);
Route::get('schedule/{id}/mark', [App\Http\Controllers\ScheduleController::class,'markForm']);
Route::get('mark', [App\Http\Controllers\MarkController::class,'store']);
Route::resource('schedule', App\Http\Controllers\ScheduleController::class);
Route::resource('class', App\Http\Controllers\StudentClassController::class);
Route::resource('material', App\Http\Controllers\MaterialController::class);
Route::get('my-schedule', [App\Http\Controllers\TeacherController::class,'teacherSchedule']);
