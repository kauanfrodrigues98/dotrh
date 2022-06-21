@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('users.cadastrar') }}" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i> Novo Usuário</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Dados do Usuário</span>
                </div>
                <div class="card-body">
                    <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                    <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                    <div class="row mt-3">
                        <div class="col-md-12 table_scroll">
                            <table id="tabela_usuarios" class="table table-sm table-striped table-hover table-bordered table-centered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($usuarios))
                                        @foreach($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td><a type="button" href="{{ route('users.detalhes', ['id' => $usuario->id]) }}">Detalhes</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
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
    <script src="{{ asset('js/admin/users.js') }}" type="text/javascript"></script>
@stop
