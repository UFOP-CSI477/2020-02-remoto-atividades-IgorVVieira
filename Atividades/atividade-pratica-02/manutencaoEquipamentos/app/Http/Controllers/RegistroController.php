<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Registro, Equipamento};
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index()
    {
        $manutencoes = Registro::with('equipamento')->get();
        return view('manutencoes.index', ['manutencoes' => $manutencoes]);
    }

    public function create()
    {
        $equipamentos = Equipamento::all();
        return view('manutencoes.create', ['equipamentos' => $equipamentos]);
    }

    public function store(Request $request)
    {
        try {
            Registro::create([
                'equipamento_id' => $request->equipamento_id,
                'user_id' => Auth::user()->id,
                'descricao' => $request->descricao,
                'data_limite' => $request->data_limite,
                'tipo' => $request->tipo,
            ]);
            $request->session()->flash('success', 'Registro cadastrado com sucesso.');
            return redirect()->route('sistema.registro.index');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Houve um erro ao cadastrar o registro.');
            return redirect()->back();
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
            report($th);
        }
    }

    public function destroy($id)
    {
        try {
            $registro = Registro::findOrFail($id)->delet();
        } catch (\Throwable $th) {
            report($th);
        }
    }
}
