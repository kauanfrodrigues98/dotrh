@extends('adminlte::page')

@section('title', 'Default')

@section('content_header')
    <h1>Defauçt</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('users.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Dados Default</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="{{ $usuario->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nome_completo">Nome Completo</label>
                                <input type="text" name="nome_completo" id="nome_completo" class="form-control form-control-sm" value="{{ $usuario->name }}">
                            </div>

                            <div class="col-md-4">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm" value="{{ $usuario->email }}">
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
    <script src="{{ asset('js/admin/users.js') }}" type="text/javascript"></script>
@stop
