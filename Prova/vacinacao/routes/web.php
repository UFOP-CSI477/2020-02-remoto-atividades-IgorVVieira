<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{PessoaController, UnidadeController, VacinaController, RegistroController};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('pessoa', PessoaController::class)->middleware('auth');

Route::resource('unidade', UnidadeController::class)->middleware('auth');

Route::resource('vacina', VacinaController::class)->middleware('auth');

Route::resource('registro', RegistroController::class);
