<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index()
    {
        $equipamentos = Registro::with('registro');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $registro = Registro::create([
                'equipamento_id' => $request->equipamento_id,
                'user_id' => Auth::user()->id,
                'descricao' => $request->descricao,
                'data_limite' => $request->data_limite,
                'tipo' => $request->tipo,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        $registro = Registro::where('id', $id)->with('equipamento', 'user')->firstOrFail();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $registro = Registro::findOrFail($id)->updte([
                'equipamento_id' => $request->equipamento_id,
                'user_id' => Auth::user()->id,
                'descricao' => $request->descricao,
                'data_limite' => $request->data_limite,
                'tipo' => $request->tipo,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $registro = Registro::findOrFail($id)->delet();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
