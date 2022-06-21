@extends('adminlte::page')

@section('title', 'Contratos de Trabalho')

@section('content_header')
    <h1>Contratos de Trabalho</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('contrato_trabalho.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Novo Contrato de Trabalho</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Contratos de Trabalho</span>
                </div>
                <div class="card-body">
                    <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                    <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                    <div class="row mt-3 table_scroll">
                        <div class="col-md-12">
                            <table id="tabela_departamento" class="table table-sm table-striped table-hover table-bordered table-centered">
                                <thead>
                                <tr>
                                    <th>Departamento</th>
                                    <th>Cargo</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($cargos))
                                    @foreach($cargos as $cargo)
                                        <tr>
                                            <td>{{ $cargo->Departamentos->nome_departamento }}</td>
                                            <td>{{ $cargo->cargo }}</td>
                                            <td><a type="button" href="{{ route('cargos.detalhes', ["id" => $cargo->id]) }}">Detalhes</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Nenhum departamento foi localizado.</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Departamento</th>
                                    <th>Cargo</th>
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
    <script src="{{ asset('js/admin/departamento/index.js') }}" type="text/javascript"></script>
@stop
