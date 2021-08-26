<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{PessoaController, UnidadeController, VacinaController, RegistroController};

Route::get('/', [RegistroController::class, 'index'])->name('index');

Auth::routes();
Route::resource('pessoa', PessoaController::class)->middleware('auth');
Route::resource('unidade', UnidadeController::class)->middleware('auth');
Route::resource('vacina', VacinaController::class)->middleware('auth');
Route::get('registro/relatorio', [RegistroController::class, 'relatorios'])->name('registro.relatorios')->middleware('auth');
Route::resource('registro', RegistroController::class);
