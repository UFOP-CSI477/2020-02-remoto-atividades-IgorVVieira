<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Registro;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        $manutencoes = Registro::with('equipamento', 'user')->get();

        return view('index', ['equipamentos' => $equipamentos, 'manutencoes' => $manutencoes]);
    }

    public function equipamentosAdm()
    {
        $equipamentos = Equipamento::with('registros')->get();
        return view('equipamento.index', ['equipamentos' => $equipamentos]);
    }

    public function create()
    {
        return view('equipamento.create');
    }

    public function store(Request $request)
    {
        try {
            Equipamento::create([
                'nome' => $request->nome
            ]);

            $request->session()->flash('success', 'Equipamento cadastrado com sucesso.');
            return redirect()->route('sistema.equipamento.index');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar equipamento.');
            return redirect()->back();
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
