
@extends('layout')
<!-- Página Principal -->
@section('conteudo')
    <form method="GET" action="{{ route('painel.index') }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-6">
                <select name="deputado_id" class="form-select" required>
                    <option value="">Selecione um deputado</option>
                    @foreach ($deputados as $dep)
                        <option value="{{ $dep->id }}" {{ request('deputado_id') == $dep->id ? 'selected' : '' }}>
                            {{ $dep->nome }} ({{ $dep->partido }}/{{ $dep->uf }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

  <!-- Tabela de despesas do deputado -->  
    @if ($deputadoSelecionado)
        <h3>Despesas de {{ $deputadoSelecionado->nome }}</h3>
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($despesas as $despesa)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($despesa->data_documento)->format('d/m/Y') }}</td>
                        <td>{{ $despesa->tipo_despesa }}</td>
                        <td>{{ $despesa->nome_fornecedor }}</td>
                        <td>R$ {{ number_format($despesa->valor_documento, 2, ',', '.') }}</td>
                        <td>
                            @if ($despesa->url_documento)
                                <a href="{{ $despesa->url_documento }}" target="_blank">Abrir</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    @endif
@endsection

