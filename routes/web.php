<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\HostingTypeController;
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
    return view('welcome');
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

    Route::resource('hosting-types', HostingTypeController::class)->only([
        'index', 'create', 'edit'
    ]);
    Route::resource('hosting', HostingController::class);
    Route::resource('ticket', TicketController::class);

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

    Route::get('/register', [FormRegistrationController::class, 'index'])->name('register.index');
    Route::get('/register', [FormRegistrationController::class, 'create'])->name('register.create');
    Route::post('/register', [FormRegistrationController::class, 'store'])->name('register.store');

    Route::get('/debug_mail/{id}', [CoursesController::class, 'register'])->name('register.register');
});