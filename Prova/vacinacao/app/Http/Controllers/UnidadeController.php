<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
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
            Unidade::create([
                'nome',
                'bairro',
                'cidade',
            ]);
            $request->session()->flash('sucess', 'Unidade cadastrada com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar unidade');
            return redirect()->back();
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
            Unidade::findOrFail($id)->update([
                'nome',
                'bairro',
                'cidade',
            ]);
            $request->session()->flash('sucess', 'Unidade atualziada com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar unidade');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            Unidade::findOrFail($id)->delete();
            $request->session()->flash('success', 'Unidade deletada com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar unidade.');
            return redirect()->back();
        }
    }
}
