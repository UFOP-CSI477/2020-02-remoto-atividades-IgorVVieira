<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Registro, Pessoa, Unidade, Vacina};
use Illuminate\Support\Facades\{Auth, Session};

class RegistroController extends Controller
{
    public function index()
    {
        $doseUnica = Registro::where('dose', 0)->count();
        $primeiraDose = Registro::where('dose', 1)->count();
        $segundaDose = Registro::where('dose', 2)->count();

        $registros = Registro::with('vacina')->get();
        $vacinas = Vacina::with('registros')->get();
        $quantidadeTotalRegistros = Registro::count();

        return view('index', [
            'doseUnica' => $doseUnica,
            'primeiraDose' => $primeiraDose,
            'segundaDose' => $segundaDose,
            'registros' => $registros,
            'vacinas' => $vacinas, 'quantidadeTotalRegistros' => $quantidadeTotalRegistros
        ]);
    }

    public function relatorios()
    {
        $registros = Registro::with('pessoa', 'unidade', 'vacina')->get();
        return view('registro.index', ['registros' => $registros]);
    }

    public function create()
    {
        if (Auth::user()) {
            $pessoas = Pessoa::all();
            $unidades = Unidade::all();
            $vacinas = Vacina::all();
            return view('registro.create', ['pessoas' => $pessoas, 'unidades' => $unidades, 'vacinas' => $vacinas]);
        } else {
            Session::flash('warning', 'Você não tem permissão para realizar esta ação');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            if (Auth::user()) {
                Registro::create([
                    'pessoa_id' => $request->pessoa_id,
                    'unidade_id' => $request->unidade_id,
                    'vacina_id' => $request->vacina_id,
                    'dose' => $request->dose,
                    'data' => $request->data,
                ]);
                $request->session()->flash('success', 'Registro cadastrado com sucesso.');
                return redirect()->route('registro.index');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
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

    public function edit(Registro $registro)
    {
        if (Auth::user()) {
            $pessoas = Pessoa::all();
            $unidades = Unidade::all();
            $vacinas = Vacina::all();

            return view('registro.edit', [
                'pessoas' => $pessoas, 'unidades' => $unidades, 'vacinas' => $vacinas, 'registro' => $registro
            ]);
        } else {
            redirect()->back();
        }
    }

    public function update(Request $request, Registro $registro)
    {
        try {
            if (Auth::user()) {
                $registro->update([
                    'pessoa_id' => $request->pessoa_id,
                    'unidade_id' => $request->unidade_id,
                    'vacina_id' => $request->vacina_id,
                    'dose' => $request->dose,
                    'data' => $request->data,
                ]);
                $request->session()->flash('success', 'Registro atualizado com sucesso.');
                return redirect()->route('registro.relatorios');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar registro, tente novamente.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, Registro $registro)
    {
        try {
            if (Auth::user()) {
                $registro->delete();
                $request->session()->flash('success', 'Registro deletado com sucesso.');
                return redirect()->route('registro.relatorios');
            } else {
                $request->session()->flash('warning', 'Você não possui permissão para executar esta ação.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao deletar registro, tente novamente.');
            return redirect()->back();
        }
    }
}
