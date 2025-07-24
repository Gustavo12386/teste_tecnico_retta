<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Services\DeputadoService;
use App\Models\Deputado;
use App\Jobs\SincronizarDespesasDeputado;

class SincronizarDeputados extends Command
{
    //comando para realizar a sincronização
    protected $signature = 'sincronizar:deputados';
    //mensagem após o comando ser executado
    protected $description = 'Sincroniza deputados e suas despesas';

    public function handle(DeputadoService $service)
    {
        $this->info("Iniciando sincronização...");

        $deputados = $service->obterDeputados();

        foreach ($deputados as $dep) {
        try{    
            $deputado = Deputado::updateOrCreate(
            ['deputado_id' => $dep['id']],
            [
                'nome' => $dep['nome'],
                'partido' => $dep['siglaPartido'],
                'uf' => $dep['siglaUf'],
                'id_legislatura' => $dep['idLegislatura'],
                'url_foto' => $dep['urlFoto'],
                'email' => $dep['email']
            ]
        );

            dispatch(new SincronizarDespesasDeputado($deputado)); // envia para a fila
          } catch (\Exception $e) {
            Log::error("Erro ao sincronizar os deputados com as despesas: " . $e->getMessage());
         }   
        }

        $this->info("Deputados sincronizados com sucesso.");
    }
}