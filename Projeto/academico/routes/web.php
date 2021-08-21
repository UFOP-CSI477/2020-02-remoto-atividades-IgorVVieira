<?php

use App\Http\Controllers\DisciplinaController;
use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\{HomeController, ProvaController, MessageController, UserDisciplinaController};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->name('academico.')->prefix('academico')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::name('disciplina.')->prefix('disciplina')->group(function () {
        Route::get('/create', [UserDisciplinaController::class, 'create'])->name('create');
        Route::post('/store', [UserDisciplinaController::class, 'store'])->name('store');
        Route::get('/show/{id}', [DisciplinaController::class, 'show'])->name('show');
        Route::get('/index', [UserDisciplinaController::class, 'index'])->name('index');
        Route::get('/minhas-notas/{id}', [DisciplinaController::class, 'minhasNotas'])->name('minhasNotas');
        Route::post('/finalizar', [UserDisciplinaController::class, 'finalizar'])->name('finalizar');

        Route::name('prova.')->prefix('prova')->group(function () {
            Route::get('/create', [ProvaController::class, 'create'])->name('create');
            Route::post('/store', [ProvaController::class, 'store'])->name('store');
            Route::put('/update', [ProvaController::class, 'update'])->name('update');
            Route::get('/index', [UserDisciplinaController::class, 'index'])->name('index');
            Route::get('/provas-json', [ProvaController::class, 'getJson'])->name('getJson');
        });
    });

    Route::name('mensagem.')->prefix('mensagem')->group(function () {
        Route::post('/store', [MessageController::class, 'store'])->name('store');
    });
});
