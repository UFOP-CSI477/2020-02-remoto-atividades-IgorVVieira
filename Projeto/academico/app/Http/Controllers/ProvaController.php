<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Disciplina;
use App\Models\UserDisciplina;
use Illuminate\Support\Facades\Auth;

class ProvaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $disciplinasCursadas = UserDisciplina::selectRaw('disciplina_id')->where('user_id', Auth::user()->id)->get();
        $disciplinas = Disciplina::whereIn('id', $disciplinasCursadas->pluck('disciplina_id'))->get();

        return view('prova.create', ['disciplinas' => $disciplinas]);
    }

    public function store(Request $request)
    {
        try {
            Prova::create([
                'nome' => $request->nome,
                'observacao' => $request->observacao,
                'data' => $request->data,
                'valor' => $request->valor,
                'user_id' => Auth::user()->id,
                'disciplina_id' => $request->disciplina_id,
            ]);
            $request->session()->flash('success', 'Atividade avaliativa cadastrada com sucesso.');
            return redirect()->route('academico.dashboard');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar atividade avaliativa.');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
