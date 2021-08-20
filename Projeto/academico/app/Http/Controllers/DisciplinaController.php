<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Disciplina, UserDisciplina, User, Message, Prova};
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

    public function minhasNotas($id)
    {
        $disciplina = Disciplina::with('provas')->findOrFail($id);
        $notaTotal = Prova::selectRaw('SUM(resultado) as total')->where('disciplina_id', $id)->firstOrfail();

        return view('disciplina.minhasNotas', ['disciplina' => $disciplina, 'notaTotal' => $notaTotal]);
    }
}
