<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Prova;
use App\Models\Disciplina;
use App\Models\UserDisciplina;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function dashboard()
    {
        $provasAbertas = Prova::whereHas('user', function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('status', 0);
        })->count();

        $provasFinalizadas = Prova::whereHas('user', function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('status', 1);
        })->count();

        $disciplinasCursando = UserDisciplina::where('user_id', Auth::user()->id)
            ->where('status', 0)->count();

        $disciplinasCursadas = UserDisciplina::where('user_id', Auth::user()->id)
            ->where('status', 1)->count();

        $disciplinasAtuais = UserDisciplina::selectRaw('disciplina_id')->where('user_id', Auth::user()->id)->get();
        $disciplinas = Disciplina::whereIn('id', $disciplinasAtuais->pluck('disciplina_id'))->get();

        return view(
            'index',
            [
                'provasAbertas' => $provasAbertas,
                'provasFinalizadas' => $provasFinalizadas,
                'disciplinasCursando' => $disciplinasCursando,
                'disciplinasCursadas' => $disciplinasCursadas,
                'disciplinasAtuais' => $disciplinasAtuais,
                'disciplinas' => $disciplinas,
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
