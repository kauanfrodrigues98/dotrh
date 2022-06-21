@extends('adminlte::page')

@section('title', 'Cadastrar Equipamento')

@section('content_header')
    <h1>Cadastrar Equipamento</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('equipamentos.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Detalhes do Equipamento</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('equipamentos.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome_equipamento">Nome Equipamento <span class="text-danger">*</span></label>
                                <input type="text" name="nome_equipamento" id="nome_equipamento" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-3">
                                <label for="valor_equipamento">Valor do Equipamento <span class="text-danger">*</span></label>
                                <input type="text" name="valor_equipamento" id="valor_equipamento" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-3">
                                <label for="tipo_equipamento">Tipo Equipamento <span class="text-danger">*</span></label>
                                <select name="tipo_equipamento" id="tipo_equipamento" class="custom-select custom-select-sm" onchange="outro_tipo(this.value)">
                                    <option value="">Selecione</option>
                                    @foreach($tipo_equipamento as $key => $tipo)
                                        <option value="{{ $key }}">{{ $tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label for="outro_tipo_equipamento">Outro Tipo Equipamento</label>
                                <input type="text" name="outro_tipo_equipamento" id="outro_tipo_equipamento" class="form-control form-control-sm" readonly>
                            </div>

                            <div class="col-md-3">
                                <label for="tag_identificacao">TAG Identificação <span class="text-danger">*</span></label>
                                <input type="text" name="tag_identificacao" id="tag_identificacao" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-6">
                                <label for="detalhes">Detalhes</label>
                                <textarea name="detalhes" id="detalhes" cols="30" rows="1" class="form-control form-control-sm"></textarea>
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
    <script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/equipamentos.js') }}" type="text/javascript"></script>
@stop
