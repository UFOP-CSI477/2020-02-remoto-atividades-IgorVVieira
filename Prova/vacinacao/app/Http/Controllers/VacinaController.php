<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vacina;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = Vacina::orderBy('nome')->get();
        return view('vacina.index', ['vacinas' => $vacinas]);
    }

    public function create()
    {
        return view('vacina.create');
    }

    public function store(Request $request)
    {
        try {
            if (Auth::user()) {
                Vacina::create([
                    'nome' => $request->nome,
                    'fabricante' => $request->fabricante,
                    'doses' => $request->doses,
                ]);
                $request->session()->flash('success', 'Vacina cadastrada com sucesso.');
                return redirect()->route('vacina.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar vacina, tente novamente.');
            return redirect()->back();
        }
    }

    public function edit(Vacina $vacina)
    {
        return view('vacina.edit', ['vacina' => $vacina]);
    }

    public function update(Request $request, Vacina $vacina)
    {
        try {
            if (Auth::user()) {
                $vacina->update([
                    'nome' => $request->nome,
                    'fabricante' => $request->fabricante,
                    'doses' => $request->doses,
                ]);
            $request->session()->flash('success', 'Vacina atualizada com sucesso.');
            return redirect()->route('vacina.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
            $request->session()->flash('success', 'Vacina atualizada com sucesso.');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Vacina atualizada com sucesso.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, Vacina $vacina)
    {
        try {
            if (Auth::user()) {
               $vacina->delete();
                $request->session()->flash('success', 'Vacina deletada com sucesso.');
                return redirect()->back();
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar vacina, tente novamente.');
            return redirect()->back();
        }
    }
}
