<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $equipamento = Equipamento::create([
                'nome' => $request->nome
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        $equipamento = Equipamento::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id)->update([
                'nome' => $request->nome,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
