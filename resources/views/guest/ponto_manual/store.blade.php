@extends('adminlte::page')

@section('title', 'Marcar Ponto Manual')

@section('content_header')
    <h1>Marcar Ponto Manual</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('ponto.manual.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Marcar Ponto Manual</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('ponto.manual.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="dia">Dia</label>
                                <input type="date" name="dia" id="dia" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-2">
                                <label for="hora_saida">Hora Saída</label>
                                <input type="time" name="hora_saida" id="hora_saida" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-2">
                                <label for="hora_entrada">Hora Entrada</label>
                                <input type="time" name="hora_entrada" id="hora_entrada" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6">
                                <label for="motivo">Motivo</label>
                                <textarea name="motivo" id="motivo" cols="30" rows="1" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-file mt-4">
                                    <input type="file" class="custom-file-input" name="anexos[]" id="anexos" multiple>
                                    <label class="custom-file-label label_anexo" for="anexos" data-browse="Procurar">Anexar Declarações</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4 offset-md-4">
                                <button type="button" class="btn btn-sm btn-primary btn-block" onclick="salvar()">Registrar Ponto</button>
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
    <script src="{{ asset('js/guest/ponto_manual/ponto.js') }}" type="text/javascript"></script>
@stop
