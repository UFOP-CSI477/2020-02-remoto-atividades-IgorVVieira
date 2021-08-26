<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unidade;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::with('registros')->get();
        return view('unidade.index', ['unidades' => $unidades]);
    }

    public function create()
    {
        return view('unidade.create');
    }

    public function store(Request $request)
    {
        try {
            if (Auth::user()) {
                Unidade::create([
                    'nome' => $request->nome,
                    'bairro' => $request->bairro,
                    'cidade' => $request->cidade,
                ]);
                $request->session()->flash('success', 'Unidade cadastrada com sucesso.');
                return redirect()->route('unidade.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar unidade');
            return redirect()->back();
        }
    }

    public function edit(Unidade $unidade)
    {
        return view('unidade.edit', ['unidade' => $unidade]);
    }

    public function update(Request $request, Unidade $unidade)
    {
        try {
            if (Auth::user()) {
                $unidade->update([
                    'nome' => $request->nome,
                    'bairro' => $request->bairro,
                    'cidade' => $request->cidade,
                ]);
                $request->session()->flash('success', 'Unidade atualziada com sucesso.');
                return redirect()->route('unidade.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar unidade');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, Unidade $unidade)
    {
        try {
            if (Auth::user()) {
                if (!$unidade->registros->isEmpty()) {
                    $request->session()->flash('warning', 'Está unidade não pode ser deletada');
                    return redirect()->back();
                }
                $unidade->delete();
                $request->session()->flash('success', 'Unidade deletada com sucesso.');
                return redirect()->back();
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar unidade.');
            return redirect()->back();
        }
    }
}
