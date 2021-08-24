<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
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
            Pessoa::create([
                'nome' => $request->nome,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'data_nascimento' => $request->data_nascimento,
            ]);
            $request->session()->flash('success', 'Pessoa cadastrado com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar pessoa, tente novamente.');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            Pessoa::findOrFail($id)->update([
                'nome' => $request->nome,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'data_nascimento' => $request->data_nascimento,
            ]);
            $request->session()->flash('success', 'Pessoa atualizado com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar pessoa, tente novamente.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            Pessoa::findOrFail($id)->delete();
            $request->session()->flash('sucess', 'Pessoa deletada com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar pessoa, tente novamente');
            return redirect()->back();
        }
    }
}
