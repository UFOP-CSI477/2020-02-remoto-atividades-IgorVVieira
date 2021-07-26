<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', [ProdutoController::class, 'index']);

Route::get('/produto/{id}', function ($id) {
    $produto = Produto::findOrFail($id);
    return view('produto.show', ['produto' => $produto]);
});
