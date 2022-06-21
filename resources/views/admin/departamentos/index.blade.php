@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content_header')
    <h1>Departamentos</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('departamentos.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Novo Departamento</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Departamentos</span>
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
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($departamentos))
                                    @foreach($departamentos as $departamento)
                                        <tr>
                                            <td>{{ $departamento->nome_departamento }}</td>
                                            <td><a type="button" href="{{ route('departamentos.detalhes', ["id" => $departamento->id]) }}">Detalhes</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Nenhum departamento foi localizado.</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Departamento</th>
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
