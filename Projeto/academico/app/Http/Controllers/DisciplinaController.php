<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Disciplina, UserDisciplina, User, Message};
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller
{
    public function index()
    {
        $user = User::with('disciplinas')->findOrFail(Auth::user()->id);
        return view('disciplina.minhasDisciplinas', ['user' => $user]);
    }

    public function create()
    {
        return view('disciplina.create');
    }

    public function store(Request $request)
    {
        try {
            $disciplina = Disciplina::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'periodo' => $request->periodo,
            ]);

            $request->session()->flash('success', 'Disciplina cadastrada com sucesso');
            return redirect()->route('academico.dashboard');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao cadastrar a disciplina. Tente novamente.');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $quantidadeCursando = UserDisciplina::where('disciplina_id', $id)->where('status', 0)->count();

        $quantidadeCursou = UserDisciplina::where('disciplina_id', $id)->where('status', 1)->count();
        $mensagens = Message::where('disciplina_id', $id)->with('user')->get();

        $users = User::whereHas('disciplinas', function ($query) use ($id) {
            $query->where('disciplinas.id', $id);
        })->get();

        return view('disciplina.show', [
            'disciplina' => $disciplina,
            'quantidadeCursando' => $quantidadeCursando,
            'quantidadeCursou' => $quantidadeCursou,
            'mensagens' => $mensagens,
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            report($th);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            report($th);
        }
    }
}
