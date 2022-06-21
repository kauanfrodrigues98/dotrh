@extends('adminlte::page')

@section('title', 'Cadastrar Usuários')

@section('content_header')
    <h1>Cadastrar Usuários</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('users.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Dados do Usuário</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store.blade.php') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nome_completo">Nome Completo</label>
                                <input type="text" name="nome_completo" id="nome_completo" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-4">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-4">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4 offset-md-4">
                                <button type="button" class="btn btn-sm btn-primary btn-block" onclick="salvar()">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.toast')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/users.js') }}" type="text/javascript"></script>
@stop
