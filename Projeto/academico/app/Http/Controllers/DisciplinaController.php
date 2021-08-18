<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\UserDisciplina;
use App\Models\User;
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
        //
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
