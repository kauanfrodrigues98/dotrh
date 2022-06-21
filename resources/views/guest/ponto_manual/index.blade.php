@extends('adminlte::page')

@section('title', 'Marcações Manuais de Ponto')

@section('content_header')
    <h1>Marcações Manuais de Pontos</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('ponto.manual.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nova Marcação</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Marcações Manuais Realizadas</span>
                </div>
                <div class="card-body">
                    <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                    <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                    <div class="row mt-3 table_scroll">
                        <div class="col-md-12">
                            <table id="tabela_ponto" class="table table-sm table-striped table-hover table-bordered table-centered">
                                <thead>
                                <tr>
                                    <th>Dia</th>
                                    <th>Hora Saída</th>
                                    <th>Hora Entrada</th>
                                    <th>Dispositivo</th>
                                    <th>IP</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($pontos))
                                    @foreach($pontos as $ponto)
                                        <tr>
                                            <td>{{ date('d/m/Y', strtotime($ponto->dia)) }}</td>
                                            <td>{{ $ponto->hora_saida }}</td>
                                            <td>{{ $ponto->hora_entrada }}</td>
                                            <td>{{ $ponto->dispositivo ?? '-' }}</td>
                                            <td>{{ $ponto->ip ?? '-' }}</td>
                                            <td><a type="button" href="{{ route('ponto.manual.detalhes', ['id' => $ponto->id]) }}">Detalhes</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Nenhuma marcação foi localizada.</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Dia</th>
                                    <th>Hora Saída</th>
                                    <th>Hora Entrada</th>
                                    <th>Dispositivo</th>
                                    <th>IP</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('components.toast')
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/guest/ponto_manual/index.js') }}" type="text/javascript"></script>
@stop
