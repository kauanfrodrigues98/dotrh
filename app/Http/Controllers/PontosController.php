<?php

namespace App\Http\Controllers;

use App\Models\Pontos;
use App\Http\Requests\StorePontosRequest;
use App\Http\Requests\UpdatePontosRequest;
use App\Services\PontosServices;
use Illuminate\Support\Facades\Auth;

class PontosController extends Controller
{
    /**
     * Exibe a view com todas marcações realizadas
     */
    public function index() {
        // Busca todas as marcações de ponto do usuário
        $pontos = PontosServices::getWithPagination();

        return view('guest.ponto.index')->with(['pontos' => $pontos]);
    }

    /**
     * Exibe o formulário de marcação de pontos.
     */
    public function create()
    {
        return view('guest.ponto.store');
    }

    /**
     * Insere os dados no banco de dados.
     *
     * @param  \App\Http\Requests\StorePontosRequest  $request
     */
    public function store(StorePontosRequest $request)
    {
        PontosServices::store($request);

        return view('guest.ponto.store');
    }

    /**
     * Exibe o fomulário com os dados da marcação que foi realizada.
     *
     * @param  int $id
     */
    public function edit(int $id)
    {
        $ponto = PontosServices::getDetails( $id );

        return view('guest.ponto.update')->with(['ponto' => $ponto]);
    }

    public function update(UpdatePontosRequest $request)
    {
        PontosServices::update($request->idPonto, $request);

        return redirect()->route('ponto.detalhes', ['id' => $request->idPonto]);
    }
}
