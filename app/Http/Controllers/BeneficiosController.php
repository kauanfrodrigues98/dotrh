<?php

namespace App\Http\Controllers;

use App\Models\Beneficios;
use App\Http\Requests\StoreBeneficiosRequest;
use App\Http\Requests\UpdateBeneficiosRequest;
use App\Services\BeneficiosServices;

class BeneficiosController extends Controller
{
    /**
     * Exibe a tela com todos os benefícios cadastrados.
     */
    public function index() {
        $beneficios = BeneficiosServices::getWithPagination();

        return view('admin.beneficios.index')->with('beneficios', $beneficios);
    }

    /**
     * Exibe o formulário de cadastro de beneficios.
     */
    public function create() {
        return view('admin.beneficios.store');
    }

    /**
     * Salva os dados submetidos pelo formulario de beneficios.
     *
     * @param  \App\Http\Requests\StoreBeneficiosRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBeneficiosRequest $request) {
        BeneficiosServices::store($request);

        return redirect()->route('beneficios.cadastrar');
    }

    /**
     * Exibe o formulario com os dados de um beneficio cadastrado atraves do seu ID
     *
     * @param int $idBeneficio
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detalhes(int $idBeneficio) {
        $result = BeneficiosServices::getDetails($idBeneficio);

        return view('admin.beneficios.update')->with('beneficio', $result);
    }

    /**
     * Salva os dados enviados pelo formulario de alteração de beneficio.
     *
     * @param  \App\Http\Requests\UpdateBeneficiosRequest  $request
     * @param  \App\Models\Beneficios  $beneficios
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBeneficiosRequest $request) {
        BeneficiosServices::update($request->idBeneficio, $request);

        return redirect()->route('beneficios.index');
    }
}
