@extends('adminlte::page')

@section('title', 'Detalhes Cargo')

@section('content_header')
    <h1>Detalhes Cargo</h1>
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
                    <form action="{{ route('cargos.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="departamento_atual" id="departamento_atual" value="{{ $cargo->Departamentos->id }}">
                        <input type="hidden" name="idCargo" id="idCargo" value="{{ $cargo->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="departamento">Departamento</label>
                                <select name="departamento" id="departamento" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="departamento_atual">Departamento Atual</label>
                                <input type="text" disabled class="form-control form-control-sm" value="{{ $cargo->Departamentos->nome_departamento }}">
                            </div>
                            <div class="col-md-3">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" class="form-control form-control-sm" value="{{ $cargo->cargo }}">
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
    <script src="{{ asset('js/admin/cargos/update.js') }}" type="text/javascript"></script>
@stop
