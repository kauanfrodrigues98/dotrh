<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContratoTrabalhosRequest;
use App\Http\Requests\UpdateContratoTrabalhosRequest;
use App\Models\ContratoTrabalhos;

class ContratoTrabalhosController extends Controller
{
    const tipo_contrato = [
        'Estágio' => 'Estágio',
        'CLT' => 'CLT',
        'PJ' => 'PJ',
        'Tempo Indeterminado' => 'Tempo Indeterminado',
        'Tempo Determinado' => 'Tempo Determinado',
        'Trabalho Eventual' => 'Trabalho Eventual',
        'Experiência' => 'Experiência',
        'Teletrabalho' => 'Teletrabalho',
        'Intermitente' => 'Intermitente',
        'Trabalho Autônomo' => 'Trabalho Autônomo'
    ];

    const tipo_salario = [
        'Por Hora' => 'Por Hora',
        'Mensal' => 'Mensal',
        'Semanal' => 'Semanal',
        'Quinzenal' => 'Quinzenal',
        'Diário' => 'Diário',
        'Bimestral' => 'Bimestral',
        'Trimestral' => 'Trimestral',
        'Semestral' => 'Semestral',
        'Anual' => 'Anual'
    ];

    const jornada_trabalho = [
        'Semanal' => 'Semanal',
        '5x1' => '5x1',
        '5x2' => '5x2',
        '6x1' => '6x1',
        '12x36' => '12x36',
        '18x36' => '18x36',
        '24x48' => '24x48'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.contrato_trabalho.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.contrato_trabalho.store')
            ->with([
                'tipo_contrato' => self::tipo_contrato,
                'tipo_salario' => self::tipo_salario,
                'jornada_trabalho' => self::jornada_trabalho
            ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContratoTrabalhosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContratoTrabalhosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContratoTrabalhos  $contratoTrabalhos
     * @return \Illuminate\Http\Response
     */
    public function show(ContratoTrabalhos $contratoTrabalhos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContratoTrabalhos  $contratoTrabalhos
     * @return \Illuminate\Http\Response
     */
    public function edit(ContratoTrabalhos $contratoTrabalhos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContratoTrabalhosRequest  $request
     * @param  \App\Models\ContratoTrabalhos  $contratoTrabalhos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContratoTrabalhosRequest $request, ContratoTrabalhos $contratoTrabalhos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContratoTrabalhos  $contratoTrabalhos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContratoTrabalhos $contratoTrabalhos)
    {
        //
    }
}
