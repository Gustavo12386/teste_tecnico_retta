<?php

namespace App\Jobs;

use App\Models\Deputado;
use Illuminate\Support\Facades\Log;
use App\Services\DeputadoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};

class SincronizarDespesasDeputado implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $deputado;

    public function __construct(Deputado $deputado)
    {
        $this->deputado = $deputado;
    }

    public function handle(DeputadoService $service)
    {
   
      $despesas = $service->obterDespesas($this->deputado->deputado_id);
   
    //listagem das despesas
    foreach ($despesas as $despesa) {
      try{
      //criação da job  
        $this->deputado->despesas()->updateOrCreate(
            ['cod_documento' => $despesa['codDocumento']], // chave única
            [
                'ano' => $despesa['ano'],
                'mes' => $despesa['mes'],
                'tipo_despesa' => $despesa['tipoDespesa'],
                'tipo_documento' => $despesa['tipoDocumento'],
                'cod_tipo_documento' => $despesa['codTipoDocumento'],
                'data_documento' => substr($despesa['dataDocumento'], 0, 10),
                'num_documento' => $despesa['numDocumento'],
                'valor_documento' => $despesa['valorDocumento'],
                'url_documento' => $despesa['urlDocumento'],
                'nome_fornecedor' => $despesa['nomeFornecedor'],
                'cnpj_cpf_fornecedor' => $despesa['cnpjCpfFornecedor'],
                'valor_liquido' => $despesa['valorLiquido'],
                'valor_glosa' => $despesa['valorGlosa'],
                'num_ressarcimento' => $despesa['numRessarcimento'],
                'cod_lote' => $despesa['codLote'],
                'parcela' => $despesa['parcela']
            ]
        );
      }  catch (\Exception $e) {
            Log::error("Erro ao salvar despesa: " . $e->getMessage());
            throw $e;
        } 
        
    }
}
}
