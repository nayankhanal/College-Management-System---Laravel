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

Route::group(['middleware'=>['auth','isAdmin']], function() {
    Route::resource('users',UserController::class);  //admin only...............
    Route::resource('students',StudentController::class); //admin only...............
    Route::resource('teachers',TeacherController::class);  //admin only.................
    Route::resource('enrollments',EnrollmentController::class);  //admin only............
});

Route::group(['middleware'=>['auth']], function(){
    Route::resource('departments',DepartmentController::class);  //common for read TS
    Route::resource('courses',CourseController::class);  //common for read TS
    Route::resource('subjects',SubjectController::class);  //common for read TS
    Route::resource('assignments',AssignmentController::class);
});


Route::get('/login', [LoginController::class, 'login'])->name('loginForm');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware'=>'auth'], function($router){
    $router->get('/', [HomeController::class, 'index'])->name('home');
});
