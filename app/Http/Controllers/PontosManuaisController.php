<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontosManuaisRequest;
use App\Http\Requests\UpdatePontosManuaisRequest;
use App\Models\PontosManuais;
use App\Services\ArquivosServices;
use App\Services\PontosManuaisServices;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class PontosManuaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontos = PontosManuaisServices::getWithPagination();

        return view('guest.ponto_manual.index')->with(['pontos' => $pontos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guest.ponto_manual.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePontosManuaisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PontosManuaisServices::store($request);

        return redirect()->route('ponto.manual.cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PontosManuais  $pontosManuais
     * @return \Illuminate\Http\Response
     */
    public function show(PontosManuais $pontosManuais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PontosManuais  $pontosManuais
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $ponto = PontosManuaisServices::getDetails($id);
        $arquivos = ArquivosServices::getDetails($id, 2);

        return view('guest.ponto_manual.update')->with(['ponto' => $ponto, 'arquivos' => $arquivos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePontosManuaisRequest  $request
     * @param  \App\Models\PontosManuais  $pontosManuais
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePontosManuaisRequest $request, PontosManuais $pontosManuais)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PontosManuais  $pontosManuais
     * @return \Illuminate\Http\Response
     */
    public function destroy(PontosManuais $pontosManuais)
    {
        //
    }
}
