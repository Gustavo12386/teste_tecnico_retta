<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 

class DeputadoController extends Controller
{
    public function getDeputado(){
      
        //Nova instância do Guzzle
        $client = new Client();

        //endpoint da API
        $apiurl = "https://dadosabertos.camara.leg.br/api/v2/deputados";
       
        //tratamento de exceções
        try {
            $response = $client->get($apiurl);
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            return response()->json($data); // Retorna os dados como JSON
        } catch (\GuzzleHttp\Exception\RequestException $e) {            
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

    }

    public function getDeputadoDespesas($id){
      
        //Nova instância do Guzzle
        $client = new Client();

        //endpoint da API
        $apiurl = "https://dadosabertos.camara.leg.br/api/v2/deputados/{$id}/despesas";
       
        //tratamento de exceções
        try {
            $response = $client->get($apiurl);
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            return response()->json($data); // Retorna os dados como JSON
        } catch (\GuzzleHttp\Exception\RequestException $e) {            
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

    }
}
