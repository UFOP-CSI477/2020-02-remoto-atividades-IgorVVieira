<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserDisciplinaController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->name('academico.')->prefix('academico')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::name('disciplina.')->prefix('disciplina')->group(function () {
        Route::get('/create', [UserDisciplinaController::class, 'create'])->name('create');
        Route::post('/store', [UserDisciplinaController::class, 'store'])->name('store');
        Route::get('/index', [UserDisciplinaController::class, 'index'])->name('index');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
