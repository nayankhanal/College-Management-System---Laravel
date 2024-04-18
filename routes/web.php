<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AssignmentController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('departments',DepartmentController::class)->middleware('auth');
Route::resource('users',UserController::class)->middleware('auth');
Route::resource('courses',CourseController::class)->middleware('auth');
Route::resource('subjects',SubjectController::class)->middleware('auth');
Route::resource('students',StudentController::class)->middleware('auth');
Route::resource('teachers',TeacherController::class)->middleware('auth');
Route::resource('enrollments',EnrollmentController::class)->middleware('auth');
Route::resource('assignments',AssignmentController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('loginForm');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware'=>'auth'], function($router){
    $router->get('/', [HomeController::class, 'index'])->name('home');
});
