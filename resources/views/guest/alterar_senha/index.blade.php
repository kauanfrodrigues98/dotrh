@extends('adminlte::page')

@section('title', 'Alterar Senha')

@section('content_header')
    <h1>Alterar Senha</h1>
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
                    <span>Alterar Senha</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('senha.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="password">Nova Senha</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="repeat_password">Repetir Senha</label>
                                <input type="password" name="repeat_password" id="repeat_password" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-sm btn-primary btn-block alinharBotao" onclick="salvar()">Salvar</button>
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
    <script src="{{ asset('js/guest/alterar_senha.js') }}" type="text/javascript"></script>
@stop
