@extends('adminlte::page')

@section('title', 'Cadastrar Benefícios')

@section('content_header')
    <h1>Cadastrar Benefícios</h1>
@stop

@section('content')
    @include('components.loader')

    <div class="row">
        <div class="col-md-3">
            <a type="button" href="{{ route('beneficios.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    @include('components.responseError')
    @include('components.responseFlash')

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Detalhes do Beneficio</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('beneficios.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome_beneficio">Nome Benefício <span class="text-danger">*</span></label>
                                <input type="text" name="nome_beneficio" id="nome_beneficio" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-3 alinharBotao">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" value="1" id="havera_desconto" name="havera_desconto" onchange="valor_descontado()">
                                    <label class="custom-control-label" for="havera_desconto">Será descontado</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="valor_desconto">Valor do Desconto</label>
                                <input type="text" name="valor_desconto" id="valor_desconto" class="form-control form-control-sm" readonly>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="tipo_beneficio">Tipo do benefício <span class="text-danger">*</span></label>
                                <select name="tipo_beneficio" id="tipo_beneficio" class="custom-select custom-select-sm" onchange="outro_benef(this.value)">
                                    <option value="">Selecione</option>
                                    <option value="1">Vale Alimentação (VA)</option>
                                    <option value="2">Vale Refeição (VR)</option>
                                    <option value="3">Vale Transporte (VT)</option>
                                    <option value="4">Auxílio Combustível</option>
                                    <option value="5">Auxílio Home Office</option>
                                    <option value="6">Plano de Saúde</option>
                                    <option value="7">Crédito</option>
                                    <option value="8">Dinheiro</option>
                                    <option value="9">Desconto</option>
                                    <option value="10">Outros</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="outro_beneficio">Outro Benefício</label>
                                <input type="text" name="outro_beneficio" id="outro_beneficio" class="form-control form-control-sm" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="valor_beneficio">Valor Beneficio <span class="text-danger">*</span></label>
                                <input type="text" name="valor_beneficio" id="valor_beneficio" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="detalhes">Detalhes</label>
                                <textarea name="detalhes" id="detalhes" rows="2" class="form-control form-control-sm"></textarea>
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
    <script src="{{ asset('js/admin/beneficios.js') }}" type="text/javascript"></script>
@stop
