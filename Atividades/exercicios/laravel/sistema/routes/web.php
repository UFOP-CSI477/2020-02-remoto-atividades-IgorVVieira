<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    return view('produto.index', ['produtos' => $produtos]);
});

Route::get('/produto/{id}', function ($id) {
    $produto = Produto::findOrFail($id);
    return view('produto.show', ['produto' => $produto]);
});
