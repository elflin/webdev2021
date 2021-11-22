<?php


use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\StudentController;
use App\Models\Project;
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
    return view(
        'home',
        [
            "active_welcome" => "active",
            "active_projects" => "",
            "active_courses" => ""
        ]
    );
});

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware('user')->group(function () {
        Route::resource('projects', ProjectController::class);
        Route::resource('courses', CourseController::class);
    });

    Route::middleware('admin')->group(function () {
        // Route::resource('projects', ProjectController::class);
        // Route::resource('courses', CourseController::class);
        Route::resource('students', StudentController::class);
        Route::resource('members', MemberController::class);
        Route::delete('membersDelete/{nim}/project/{id}', [MemberController::class, 'destroy'])->name('membersDelete');
        Route::get('/table', function () {
            return view('table');
        });
    });
});


