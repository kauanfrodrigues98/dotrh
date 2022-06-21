@extends('adminlte::page')

@section('title', 'Detalhes Benefícios')

@section('content_header')
    <h1>Detalhes Benefícios</h1>
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
                    <form action="{{ route('beneficios.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="idBeneficio" id="idBeneficio" value="{{ $beneficio->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome_beneficio">Nome Benefício <span class="text-danger">*</span></label>
                                <input type="text" name="nome_beneficio" id="nome_beneficio" class="form-control form-control-sm" value="{{ $beneficio->nome_beneficio }}">
                            </div>

                            <div class="col-md-3 alinharBotao">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" value="1" id="havera_desconto" name="havera_desconto" onchange="valor_descontado()" {{ ($beneficio->havera_desconto == 1) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="havera_desconto">Será descontado</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="valor_desconto">Valor do Desconto</label>
                                <input type="text" name="valor_desconto" id="valor_desconto" class="form-control form-control-sm" {{ ($beneficio->havera_desconto) != 1 ? 'readonly' : '' }} value="{{ number_format($beneficio->valor_desconto, 2, ',', '.') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="tipo_beneficio">Tipo do benefício <span class="text-danger">*</span></label>
                                <select name="tipo_beneficio" id="tipo_beneficio" class="custom-select custom-select-sm" onchange="outro_benef(this.value)">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($beneficio->tipo_beneficio == 1 ? 'selected' : '') }}>Vale Alimentação (VA)</option>
                                    <option value="2" {{ ($beneficio->tipo_beneficio == 2 ? 'selected' : '') }}>Vale Refeição (VR)</option>
                                    <option value="3" {{ ($beneficio->tipo_beneficio == 3 ? 'selected' : '') }}>Vale Transporte (VT)</option>
                                    <option value="4" {{ ($beneficio->tipo_beneficio == 4 ? 'selected' : '') }}>Auxílio Combustível</option>
                                    <option value="5" {{ ($beneficio->tipo_beneficio == 5 ? 'selected' : '') }}>Auxílio Home Office</option>
                                    <option value="6" {{ ($beneficio->tipo_beneficio == 6 ? 'selected' : '') }}>Plano de Saúde</option>
                                    <option value="7" {{ ($beneficio->tipo_beneficio == 7 ? 'selected' : '') }}>Crédito</option>
                                    <option value="8" {{ ($beneficio->tipo_beneficio == 8 ? 'selected' : '') }}>Dinheiro</option>
                                    <option value="9" {{ ($beneficio->tipo_beneficio  == 9 ? 'selected' : '') }}>Desconto</option>
                                    <option value="10" {{ ($beneficio->tipo_beneficio == 10 ? 'selected' : '') }}>Outros</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="outro_beneficio">Outro Benefício</label>
                                <input type="text" name="outro_beneficio" id="outro_beneficio" class="form-control form-control-sm" {{ ($beneficio->tipo_beneficio != 10) ? 'readonly' : '' }} value="{{ $beneficio->outro_beneficio }}">
                            </div>

                            <div class="col-md-4">
                                <label for="valor_beneficio">Valor Beneficio <span class="text-danger">*</span></label>
                                <input type="text" name="valor_beneficio" id="valor_beneficio" class="form-control form-control-sm" value="{{ number_format($beneficio->valor_beneficio, 2, ',', '.') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="detalhes">Detalhes</label>
                                <textarea name="detalhes" id="detalhes" rows="2" class="form-control form-control-sm">{{ $beneficio->detalhes }}</textarea>
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
