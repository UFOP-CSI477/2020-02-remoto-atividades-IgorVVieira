<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function index()
    {
        $registro = Registro::with('pessoa', 'unidade', 'vacina')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            Registro::create([
                'pessoa_id' => $request->pessoa_id,
                'unidade_id' => $request->unidade_id,
                'vacina_id' => $request->vacina_id,
                'dose' => $request->dose,
                'data' => $request->data,
            ]);
            $request->session()->flash('success', 'Registro cadastrado com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('errir', 'Erro ao cadastrar registro, tente novamente.');
            redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            Registro::findOrFail($id)->update([
                'pessoa_id' => $request->pessoa_id,
                'unidade_id' => $request->unidade_id,
                'vacina_id' => $request->vacina_id,
                'dose' => $request->dose,
                'data' => $request->data,
            ]);
            $request->session()->flash('success', 'Registro atualizado com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar registro, tente novamente.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            Registro::findOrFail($id)->delete();
            $request->session()->flash('success', 'Registro deletado com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar registro, tente novamente.');
            return redirect()->back();
        }
    }
}
