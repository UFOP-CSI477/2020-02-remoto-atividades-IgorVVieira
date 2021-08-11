<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EquipamentoController;

Route::get('/', [EquipamentoController::class, 'index'])->name('index');

Auth::routes();

Route::middleware('auth')->name('sistema.')->prefix('sistema')->group(function () {
    Route::name('equipamento.')->prefix('equipamento')->group(function () {
        Route::get('/equipamentos', [EquipamentoController::class, 'equipamentosAdm'])->name('index');
        Route::get('/novo-equipamento', [EquipamentoController::class, 'create'])->name('create');
        Route::post('/store', [EquipamentoController::class, 'store'])->name('store');
    });

    Route::name('registro.')->prefix('registro')->group(function () {
        Route::get('/', [RegistroController::class, 'index'])->name('index');
        Route::get('/novo-registro', [RegistroController::class, 'create'])->name('create');
        Route::post('/store', [RegistroController::class, 'store'])->name('store');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
