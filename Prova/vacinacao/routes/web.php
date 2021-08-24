<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{PessoaController, UnidadeController, VacinaController, RegistroController};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->name('vacinacao.')->prefix('vacinacao')->group(function () {
    Route::resource('pessoa', PessoaController::class);

    Route::resource('unidade', UnidadeController::class);

    Route::resource('vacina', VacinaController::class);

    Route::resource('registro', RegistroController::class);
});
