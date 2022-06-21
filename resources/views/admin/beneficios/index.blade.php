@extends('adminlte::page')

@section('title', 'Benefícios')

@section('content_header')
    <h1>Benefícios</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('beneficios.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Novo Benefício</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Detalhes do Benefício</span>
                </div>
                <div class="card-body">
                    <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                    <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                    <div class="row mt-3 table_scroll">
                        <div class="col-md-12">
                            <table id="tabela_beneficios" class="table table-sm table-striped table-hover table-bordered table-centered">
                                <thead>
                                <tr>
                                    <th>Beneficio</th>
                                    <th>Tipo Beneficio</th>
                                    <th>Desconto</th>
                                    <th>Valor Desconto</th>
                                    <th>Valor Beneficio</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($beneficios))
                                        @foreach($beneficios as $beneficio)

                                            @switch($beneficio->tipo_beneficio)
                                                @case(1)
                                                    <?php $tipo_beneficio = 'Vale Alimentação' ?>
                                                @break
                                                @case(2)
                                                    <?php $tipo_beneficio = 'Vale Refeição' ?>
                                                @break
                                                @case(3)
                                                    <?php $tipo_beneficio = 'Vale Transporte' ?>
                                                @break
                                                @case(4)
                                                    <?php $tipo_beneficio = 'Auxilio Combustivel' ?>
                                                @break
                                                @case(5)
                                                    <?php $tipo_beneficio = 'Auxilio Home Office' ?>
                                                @break
                                                @case(6)
                                                    <?php $tipo_beneficio = 'Plano de Saúde' ?>
                                                @break
                                                @case(7)
                                                    <?php $tipo_beneficio = 'Crédito' ?>
                                                @break
                                                @case(8)
                                                    <?php $tipo_beneficio = 'Dinheiro' ?>
                                                @break
                                                @case(9)
                                                    <?php $tipo_beneficio = 'Desconto' ?>
                                                @break
                                                @case(10)
                                                    <?php $tipo_beneficio = $beneficio->outro_beneficio ?>
                                                @break
                                            @endswitch

                                            <tr>
                                                <td>{{ $beneficio->nome_beneficio }}</td>
                                                <td>{{ $tipo_beneficio }}</td>
                                                <td>{{ $beneficio->havera_desconto == 1 ? 'Sim' : 'Não' }}</td>
                                                <td>{{ number_format($beneficio->valor_desconto, 2, ',', '.') }}</td>
                                                <td>{{ number_format($beneficio->valor_beneficio, 2, ',', '.') }}</td>
                                                <td>{{ $beneficio->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                                                <td><a type="button" href="{{ route('beneficios.detalhes', ['id' => $beneficio->id]) }}">Detalhes</a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Nenhum benefício foi localizado.</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Beneficio</th>
                                        <th>Tipo Beneficio</th>
                                        <th>Desconto</th>
                                        <th>Valor Desconto</th>
                                        <th>Valor Beneficio</th>
                                        <th>Status</th>
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
    <script src="{{ asset('js/admin/beneficios.js') }}" type="text/javascript"></script>
@stop
