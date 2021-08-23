<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Prova, Disciplina, UserDisciplina};
use Illuminate\Support\Facades\Auth;

class ProvaController extends Controller
{
    public function create()
    {
        $disciplinasCursadas = UserDisciplina::selectRaw('disciplina_id')->where('user_id', Auth::user()->id)->get();
        $disciplinas = Disciplina::whereIn('id', $disciplinasCursadas->pluck('disciplina_id'))->get();

        return view('prova.create', ['disciplinas' => $disciplinas]);
    }

    public function getJson()
    {
        $provas = Prova::whereHas('user', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

        foreach ($provas as $prova) {
            $data[] = array(
                'id' => $prova->id,
                'title' => $prova->nome,
                'description' => $prova->observacao,
                'start' => $prova->data_inicio,
                'end' => isset($prova->data_termino) ? $prova->data_termino : $prova->data_inicio,
                'backgroundColor' => '#0073b7',
                'borderColor' => '#0073b7',
                'extendedProps' => [
                    'valor'   => $prova->valor,
                    'resultado' => $prova->resultado,
                    'disciplina_id' => $prova->disciplina_id,
                    'data_inicio' => $prova->data_inicio,
                    'data_termino' => $prova->data_termino,
                    'resultado' => $prova->resultado,
                    'status' => $prova->status,
                ]
            );
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $notaTotal = Prova::selectRaw('SUM(resultado) as total')->where('disciplina_id', $request->disciplina_id)->firstOrFail();

            if ($notaTotal->total + $request->valor > 100) {
                $request->session()->flash('warning', 'A nota total não pode ser maior que 100.');
                return redirect()->route('academico.dashboard');
            }

            Prova::create([
                'nome' => $request->nome,
                'observacao' => $request->observacao,
                'data_inicio' => $request->data_inicio,
                'data_termino' => isset($request->data_termino) ? $request->data_termino : $request->data_inicio,
                'valor' => $request->valor,
                'status' => 0,
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

    public function update(Request $request)
    {
        try {
            $notaTotal = Prova::selectRaw('SUM(resultado) as total')->where('disciplina_id', $request->disciplina_id)->firstOrFail();

            $prova = Prova::FindOrFail($request->id);
            $prova->update([
                'nome' => $request->nome,
                'observacao' => $request->observacao,
                'data_inicio' => $request->data_inicio,
                'data_termino' => $request->data_termino,
                'valor' => $request->valor,
                'disciplina_id' => $request->disciplina_id,
                'resultado' => $request->resultado,
                'status' => $request->status,
            ]);
            $request->session()->flash('success', 'Atividade avaliativa atualizada com sucesso');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            $request->session()->flash('error', 'Erro ao atualizar atividade avaliativa');
            return redirect()->back();
        }
    }
}
