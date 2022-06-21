@extends('adminlte::page')

@section('title', 'Alterar Usuários')

@section('content_header')
    <h1>Alterar Usuário</h1>
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
                <div class="card-body">
                    <form action="{{ route('users.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="{{ $usuario->id }}">

                        <article class="article">
                            <div class="grid__item--1of1 text-center">
                                <div class="tabs">
                                    <input type="radio" name="tabs" id="tab1" checked >
                                    <label for="tab1" class="labelTab">
                                        <i class="icon email-cal"></i><span>Dados Pessoais</span>
                                    </label>
                                    <input type="radio" name="tabs" id="tab2">
                                    <label for="tab2" class="labelTab">
                                        <i class="icon snapshot"></i><span>Endereço</span>
                                    </label>
                                    <input type="radio" name="tabs" id="tab3">
                                    <label for="tab3" class="labelTab">
                                        <i class="icon inbox-apps"></i><span>Documentos</span>
                                    </label>
                                    <input type="radio" name="tabs" id="tab4">
                                    <label for="tab4" class="labelTab">
                                        <i class="icon log-calls"></i><span>Informações de Hierarquia</span>
                                    </label>
                                    <div id="tab__content--1" class="tab__content">
                                        @include('admin.usuarios.tab_update.dados_pessoais')
                                    </div>
                                    <div id="tab__content--2" class="tab__content">
                                        @include('admin.usuarios.tab_update.endereco')
                                    </div>
                                    <div id="tab__content--3" class="tab__content">
                                        @include('admin.usuarios.tab_update.documentos')
                                    </div>
                                    <div id="tab__content--4" class="tab__content">
                                        @include('admin.usuarios.tab_update.informacoes_hierarquia')
                                    </div>
                                </div>
                            </div>
                        </article>

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
    <script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/users.js') }}" type="text/javascript"></script>
@stop
