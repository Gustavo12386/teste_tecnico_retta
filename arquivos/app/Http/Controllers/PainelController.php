<?php

namespace App\Http\Controllers;

use App\Models\Deputado;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index(Request $request)
    {
        //Ordenar deputados por ordem alfabética
        $deputados = Deputado::orderBy('nome')->get();

        //seleção do deputado
        $deputadoSelecionado = null;

        //array para listar as despesas
        $despesas = [];

        if ($request->has('deputado_id')) {
            $deputadoSelecionado = Deputado::find($request->deputado_id);
            if ($deputadoSelecionado) {
                $despesas = $deputadoSelecionado->despesas()->orderByDesc('data_documento')->paginate(10);
            }
        }

        return view('painel.index', compact('deputados', 'deputadoSelecionado', 'despesas'));
    }

   
}
