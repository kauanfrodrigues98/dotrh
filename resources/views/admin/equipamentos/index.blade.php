@extends('adminlte::page')

@section('title', 'Equipamentos')

@section('content_header')
    <h1>Equipamentos</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('equipamentos.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Novo Equipamento</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Detalhes do Equipamentos</span>
                </div>
                <div class="card-body">
                    <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                    <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                    <div class="row mt-3 table_scroll">
                        <div class="col-md-12">
                            <table id="tabela_equipamentos" class="table table-sm table-striped table-hover table-bordered table-centered">
                                <thead>
                                    <tr>
                                        <th>Nome Equipamento</th>
                                        <th>Tipo Equipamento</th>
                                        <th>Valor Equipamento</th>
                                        <th>Tag Identificação</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($equipamentos))
                                    @foreach($equipamentos as $equipamento)

                                        @switch($equipamento->tipo_equipamento)
                                            @case(1)
                                                <?php $tipo_equipamento = 'Computador' ?>
                                            @break
                                            @case(2)
                                                <?php $tipo_equipamento = 'Notebook' ?>
                                            @break
                                            @case(3)
                                                <?php $tipo_equipamento = 'Celular' ?>
                                            @break
                                            @case(4)
                                                <?php $tipo_equipamento = 'Monitor' ?>
                                            @break
                                            @case(5)
                                                <?php $tipo_equipamento = 'Mesa' ?>
                                            @break
                                            @case(6)
                                                <?php $tipo_equipamento = 'Cadeira' ?>
                                            @break
                                            @case(7)
                                                <?php $tipo_equipamento = 'Mouse' ?>
                                            @break
                                            @case(8)
                                                <?php $tipo_equipamento = 'Teclado' ?>
                                            @break
                                            @case(9)
                                                <?php $tipo_equipamento = 'Suporte Notebook' ?>
                                            @break
                                            @case(10)
                                                <?php $tipo_equipamento = 'Kit Boas Vindas' ?>
                                            @break
                                            @case(11)
                                                <?php $tipo_equipamento = $equipamento->outro_tipo_equipamento ?>
                                            @break
                                            @default
                                        @endswitch

                                        <tr>
                                            <td>{{ $equipamento->nome_equipamento }}</td>
                                            <td>{{ $tipo_equipamento }}</td>
                                            <td>{{ number_format($equipamento->valor_equipamento, 2, ',', '.') }}</td>
                                            <td>{{ $equipamento->tag_identificacao }}</td>
                                            <td>{{ $equipamento->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                                            <td><a type="button" href="{{ route('equipamentos.detalhes', ['id' => $equipamento->id]) }}">Detalhes</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Nenhum equipamento foi localizado.</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                <tr>
                                    <th>Nome Equipamento</th>
                                    <th>Tipo Equipamento</th>
                                    <th>Valor Equipamento</th>
                                    <th>Tag Identificação</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
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
    <script src="{{ asset('js/admin/equipamentos.js') }}" type="text/javascript"></script>
@stop
