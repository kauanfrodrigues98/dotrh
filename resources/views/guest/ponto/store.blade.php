@extends('adminlte::page')

@section('title', 'Marcar Ponto')

@section('content_header')
    <h1>Marcar Ponto</h1>
@stop

@section('content')
    @php 
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 
        date_default_timezone_set('America/Sao_Paulo');
    @endphp
                                    
    @include('components.loader')

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
                    <span>Marcar Ponto</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('ponto.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="responseFlash" id="responseFlash" value="{{ Session::get('responseFlash') }}">
                        <input type="hidden" name="msgFlash" id="msgFlash" value="{{ Session::get('msgFlash') }}">
                        <input type="hidden" name="ponto" id="ponto">
                        <div class="row">
                            <div class="col-md-4 offset-md-4" style="text-align: center;">
                                <div class="clock"></div>
                            </div>
                            <div class="col-md-4 offset-md-4 mt-3" style="text-align: center;">
                                <h5>{{ strftime('%A, %d de %B de %Y', strtotime('today')) }}</h5>
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
    <link href='https://fonts.googleapis.com/css?family=Orbitron&text=0123456789:AMP' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/funcoes.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/toast.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/guest/ponto/ponto.js') }}" type="text/javascript"></script>
@stop
