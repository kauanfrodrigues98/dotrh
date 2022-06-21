@extends('adminlte::page')

@section('title', 'Ajuste de Ponto')

@section('content_header')
    <h1>Ajuste de Ponto</h1>
@stop

@section('content')
    @include('components.loader')

    @switch($ponto->tipo)
        @case('E')
            @php $tipo = "Entrada"; @endphp
            @break
        @case('S')
            @php $tipo = "Saída"; @endphp
            @break
        @default
            @php $tipo = '-'; @endphp
    @endswitch

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('ponto.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Dados do Ponto</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('ponto.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="idPonto" id="idPonto" value="{{ $ponto->id }}">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="dia">Dia</label>
                                <input type="text" name="dia" id="dia" class="form-control form-control-sm" value="{{ date('d/m/Y', strtotime($ponto->dia)) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="hora">Hora</label>
                                <input type="text" name="hora" id="hora" class="form-control form-control-sm" value="{{ $ponto->hora }}">
                            </div>
                            <div class="col-md-3">
                                <label for="dispositivo">Dispositivo</label>
                                <input type="text" name="dispositivo" id="dispositivo" class="form-control form-control-sm" disabled value="{{ $ponto->dispositivo }}">
                            </div>
                            <div class="col-md-3">
                                <label for="ip">IP</label>
                                <input type="text" name="ip" id="ip" class="form-control form-control-sm" disabled value="{{ $ponto->ip }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label for="tipo">Tipo</label>
                                <input type="text" name="tipo" id="tipo" class="form-control form-control-sm" disabled value="{{ $tipo }}">
                            </div>
                            <div class="col-md-6">
                                <label for="motivo">Motivo</label>
                                <textarea name="motivo" id="motivo" cols="30" rows="1" class="form-control form-control-sm"></textarea>
                            </div>
                            <div class="col-md-3">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/guest/ponto/update_ponto.js') }}" type="text/javascript"></script>
@stop
