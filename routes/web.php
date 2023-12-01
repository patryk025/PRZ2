<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\MaterialControler;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FormRegistrationController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group([
        'as' => 'users.',
        'prefix' => 'users'
    ], function() {
        Route::get('', [UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });

    Route::get('async/users', [UserController::class, 'async'])
        ->name('async.users');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CoursesController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [CoursesController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [CoursesController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');

    Route::get('/timetable', function() {
        return view('timetables.index');
    })->name("timetable.index");

    Route::get('/courses/{id}/timetable', [CoursesController::class, 'show'])->name('courses.timetable');
    Route::post('/courses/{id}/timetable', [LessonController::class, 'create'])->name('courses.timetable_add');
    Route::post('/courses/{id}/timetable/{timetable_id}', [LessonController::class, 'update'])->name('courses.timetable_edit');
    Route::get('/courses/{id}/materials', [MaterialControler::class, 'index'])->name('courses.materials');
    Route::post('/courses/{id}/materials/create', [MaterialControler::class, 'store'])->name('courses.materials.create');
    Route::get('/courses/{id}/materials/delete/{material_id}', [MaterialControler::class, 'destroy'])->name('courses.materials.delete');

    Route::get('/courses/{id}/register', [CoursesController::class, 'create'])->name('courses.join');
    #Route::get('/register', [FormRegistrationController::class, 'create'])->name('register.create');
    Route::post('/register', [FormRegistrationController::class, 'store'])->name('register.store');

    Route::get('/debug_mail/{id}', [CoursesController::class, 'register'])->name('register.register');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    //Route::resource('teachers', TeacherController::class);
});