@extends('adminlte::page')

@section('title', 'Cadastrar Contrato de Trabalho')

@section('content_header')
    <h1>Cadastrar Contrato de Trabalho</h1>
@stop

@section('content')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('contrato_trabalho.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cargos.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">

                        <ul class="nav nav-tabs navPadrao mb-4" id="myTab" role="tablist">
                            <li class="nav-item navItemPadrao" role="presentation">
                                <a class="nav-link navPadrao active" id="contrato-tab" data-toggle="tab" href="#contrato" role="tab" aria-controls="contrato" aria-selected="true">
                                    <span class="material-symbols-outlined">description</span>
                                </a>
                                <span class="lblTab">Contrato</span>
                            </li>
                            <li class="nav-item navItemPadrao" role="presentation">
                                <a class="nav-link navPadrao" id="postoTrabalho-tab" data-toggle="tab" href="#postoTrabalho" role="tab" aria-controls="postoTrabalho" aria-selected="false">
                                    <span class="material-symbols-outlined">home_pin</span>
                                </a>
                                <span class="lblTab">Posto de Trabalho</span>
                            </li>
                            <li class="nav-item navItemPadrao" role="presentation">
                                <a class="nav-link navPadrao" id="empregador-tab" data-toggle="tab" href="#empregador" role="tab" aria-controls="empregador" aria-selected="false">
                                    <span class="material-symbols-outlined">person_pin_circle</span>
                                </a>
                                <span class="lblTab">Empregador</span>
                            </li>
                            <li class="nav-item navItemPadrao" role="presentation">
                                <a class="nav-link navPadrao" id="salario-tab" data-toggle="tab" href="#salario" role="tab" aria-controls="salario" aria-selected="false">
                                    <span class="material-symbols-outlined">payments</span>
                                </a>
                                <span class="lblTab">Salário</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contrato" role="tabpanel" aria-labelledby="contrato-tab">
                                @include('admin.contrato_trabalho.tabs.contrato')
                            </div>
                            <div class="tab-pane fade" id="postoTrabalho" role="tabpanel" aria-labelledby="postoTrabalho-tab">
                                @include('admin.contrato_trabalho.tabs.posto_trabalho')
                            </div>
                            <div class="tab-pane fade" id="empregador" role="tabpanel" aria-labelledby="empregador-tab">
                                @include('admin.contrato_trabalho.tabs.empregador')
                            </div>
                            <div class="tab-pane fade" id="salario" role="tabpanel" aria-labelledby="salario-tab">
                                @include('admin.contrato_trabalho.tabs.salario')
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
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/contrato_trabalho/store.js') }}" type="text/javascript"></script>
@stop
