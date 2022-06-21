@extends('adminlte::page')

@section('title', 'Cadastrar Cargo')

@section('content_header')
    <h1>Cadastrar Cargo</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('cargos.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Dados do Cargo</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('cargos.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="departamento">Departamento</label>
                                <select name="departamento" id="departamento" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-md-6">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" class="form-control form-control-sm">
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
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/cargos/store.js') }}" type="text/javascript"></script>
@stop
