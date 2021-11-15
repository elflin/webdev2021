<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('home', 
        [
            "active_welcome" => "active",
            "active_projects" => "",
            "active_courses" => ""
        ]
    );
});

Route::resource('projects', ProjectController::class);
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('members', MemberController::class);
Route::delete('membersDelete/{nim}/project/{id}', [MemberController::class, 'destroy'])->name('membersDelete');
Route::get('/table', function(){
    return view('table');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('user', [UserController::class, 'index']);
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
});
