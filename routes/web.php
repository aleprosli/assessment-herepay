<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'index')->name('student.index');
    Route::get('/student/template', 'template')->name('student.template');
    Route::post('/student/upload', 'import')->name('student.upload');
    Route::get('/student/destroy/{student}', 'destroy')->name('student.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
