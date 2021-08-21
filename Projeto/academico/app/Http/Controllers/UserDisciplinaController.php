<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserDisciplina, Disciplina, User, Prova};
use Illuminate\Support\Facades\Auth;

class UserDisciplinaController extends Controller
{
    public function index()
    {
        $user = User::with('disciplinas')->findOrFail(Auth::user()->id);
        return view('disciplina.minhasDisciplinas', ['user' => $user]);
    }

    public function create()
    {
        $disciplinasCursadas = UserDisciplina::selectRaw('disciplina_id')->where('user_id', Auth::user()->id)->get();
        $disciplinas = Disciplina::whereNotIn('id', $disciplinasCursadas->pluck('disciplina_id'))->get();

        return view('disciplina.create', ['disciplinas' => $disciplinas]);
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->disciplinas as $disciplina) {
                UserDisciplina::create([
                    'user_id' => Auth::user()->id,
                    'disciplina_id' => $disciplina,
                ]);
            }
            $request->session()->flash('success', 'Disciplinas vinculadas com sucesso.');
            return redirect()->route('academico.dashboard');
        } catch (\Throwable $th) {
            report($th);
            $request->session()->flash('error', 'Erro ao vincular disciplinas.');
            return redirect()->back();
        }
    }

    public function finalizar(Request $request)
    {
        try {
            $userDisciplina = UserDisciplina::where('user_id', Auth::user()->id)
                ->where('disciplina_id', $request->id)->firstOrFail();
            $notaTotal = Prova::selectRaw('SUM(resultado) as total')->where('disciplina_id', $request->id)->firstOrfail();

            if ($notaTotal->total >= 60) {
                $userDisciplina->status = 1;
                $request->session()->flash('success', 'Discciplina finalizada com sucesso, você foi aprovado.');
            } else {
                $userDisciplina->status = 2;
                $request->session()->flash('warning', 'Discciplina finalizada com sucesso, você foi reprovado.');
            }
            $userDisciplina->save();
            return redirect()->route('academico.dashboard');
        } catch (\Throwable $th) {
            report($th);
            return redirect()->route('academico.dashboard');
        }
    }
}
