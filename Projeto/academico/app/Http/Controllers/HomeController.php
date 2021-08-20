<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Prova, Disciplina, UserDisciplina};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $disciplinas = Auth::user()->disciplinas;
        return response()->json($disciplinas);
        return view('home');
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
}
