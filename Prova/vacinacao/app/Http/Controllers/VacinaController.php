<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vacina;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = Vacina::all();
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
                Vacina::create([
                    'nome' => $request->nome,
                    'fabricante' => $request->fabricante,
                    'doses' => $request->doses,
                ]);
                $request->session()->flash('success', 'Vacina cadastrada com sucesso.');
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
            if (Auth::user()) {
                Vacina::findOrFail($id)->update([
                    'nome' => $request->nome,
                    'fabricante' => $request->fabricante,
                    'doses' => $request->doses,
                ]);
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

    public function destroy(Request $request, $id)
    {

        try {
            if (Auth::user()) {
                Vacina::findOrFail($id)->delete();
                $request->session()->flash('success', 'Vacina deletada com sucesso.');
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
