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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::post('/teacher-login', [App\Http\Controllers\TeacherAuthController::class, 'login'])->name('teacher.login');
Route::get('/teacher-login', [App\Http\Controllers\TeacherAuthController::class, 'index'])->name('teacher.loginform');
Route::get('/teacher-dashboard', [App\Http\Controllers\TeacherController::class, 'dashboard'])->name('teacher.dashboard');

Route::post('/student-login', [App\Http\Controllers\StudentAuthController::class, 'login'])->name('student.login');
Route::get('/student-login', [App\Http\Controllers\StudentAuthController::class, 'index'])->name('student.loginform');
Route::get('/student-dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('material/{file}/download', [App\Http\Controllers\MaterialController::class,'download']);
Route::resource('task', App\Http\Controllers\TaskController::class);
Route::resource('student', App\Http\Controllers\StudentController::class);
Route::resource('teacher', App\Http\Controllers\TeacherController::class);
Route::get('teacher/{id}/detail', [App\Http\Controllers\TeacherController::class, 'detail'])->name('teacher.detail');
Route::get('schedule/{id}/mark', [App\Http\Controllers\ScheduleController::class,'markForm']);
Route::get('mark', [App\Http\Controllers\MarkController::class,'store']);
Route::resource('schedule', App\Http\Controllers\ScheduleController::class);
Route::resource('class', App\Http\Controllers\StudentClassController::class);
Route::resource('material', App\Http\Controllers\MaterialController::class);
Route::get('my-schedule', [App\Http\Controllers\TeacherController::class,'teacherSchedule']);
Route::resource('academic', App\Http\Controllers\AcademicController::class);
Route::resource('payment', App\Http\Controllers\PaymentController::class);
Route::resource('course', App\Http\Controllers\CourseController::class);
Route::resource('room', App\Http\Controllers\RoomController::class);