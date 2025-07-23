<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeputadoService
{
    public function obterDeputados()
    {
        $response = Http::get('https://dadosabertos.camara.leg.br/api/v2/deputados');
        return $response->json()['dados'];
    }

    public function obterDespesas($id)
    {
        $response = Http::get("https://dadosabertos.camara.leg.br/api/v2/deputados/{$id}/despesas");
        return $response->json()['dados'];
    }
}