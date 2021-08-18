<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDisciplina;
use App\Models\Disciplina;
use App\Models\User;
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
