<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('pessoa.index', ['pessoas' => $pessoas]);
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
            if (Auth::user()) {
                Pessoa::create([
                    'nome' => $request->nome,
                    'bairro' => $request->bairro,
                    'cidade' => $request->cidade,
                    'data_nascimento' => $request->data_nascimento,
                ]);
                $request->session()->flash('success', 'Pessoa cadastrado com sucesso.');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
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

    public function edit(Pessoa $pessoa)
    {
        if (Auth::user()) {
            return view('pessoa.edit', ['pessoa' => $pessoa]);
        } else {
            redirect()->back();
        }
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        try {
            if (Auth::user()) {
                $pessoa->update([
                    'nome' => $request->nome,
                    'bairro' => $request->bairro,
                    'cidade' => $request->cidade,
                    'data_nascimento' => $request->data_nascimento,
                ]);
                $request->session()->flash('success', 'Pessoa atualizado com sucesso.');
                return redirect()->route('pessoa.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar pessoa, tente novamente.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            if (Auth::user()) {
                Pessoa::findOrFail($id)->delete();
                $request->session()->flash('sucess', 'Pessoa deletada com sucesso.');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar pessoa, tente novamente');
            return redirect()->back();
        }
    }
}
