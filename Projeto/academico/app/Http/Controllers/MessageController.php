<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        try {
            $mensagem = Message::create([
                'mensagem' => $request->mensagem,
                'user_id' => Auth::user()->id,
                'disciplina_id' => $request->disciplina_id,
            ]);

            $response['mensagem'] = $mensagem;
            $response['success'] = 'Mensagem enviada com sucesso.';
            return response()->json($response);
        } catch (\Throwable $th) {
            report($th);
            $response['error'] = 'Erro ao enviar mensagem. Tente novamente.';
            return response()->json($response);
        }
    }
}
