<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Http\Requests\StoreEquipamentosRequest;
use App\Http\Requests\UpdateEquipamentosRequest;
use App\Services\EquipamentosServices;

class EquipamentosController extends Controller
{
    /**
     * Exibe a lista de equipamentos cadastrados
     */
    public function index() {
        $equipamentos = EquipamentosServices::getWithPagination();

        return view('admin.equipamentos.index')->with('equipamentos', $equipamentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        // Lista de tipos de equipamento que irá popular o <select>
        $tipo_equipamento = [
            1 => 'Computador',
            2 => 'Notebook',
            3 => 'Celular',
            4 => 'Monitor',
            5 => 'Mesa',
            6 => 'Cadeira',
            7 => 'Mouse',
            8 => 'Teclado',
            9 => 'Suporte Notebook',
            10 => 'Kit Boas Vindas',
            11 => 'Outros'
        ];

        return view('admin.equipamentos.store')->with(['tipo_equipamento' => $tipo_equipamento]);
    }

    /**
     * Cadastra um novo equipamento.
     *
     * @param  \App\Http\Requests\StoreEquipamentosRequest  $request
     */
    public function store(StoreEquipamentosRequest $request) {
        EquipamentosServices::store($request);

        return redirect()->route('equipamentos.cadastrar');
    }

    /**
     * Exibe os detalhes de um equipamento atraves do seu ID
     *
     * @param  \App\Models\Equipamentos  $equipamentos
     */
    public function show(int $idEquipamento) {
        $tipo_equipamento = [
            1 => 'Computador',
            2 => 'Notebook',
            3 => 'Celular',
            4 => 'Monitor',
            5 => 'Mesa',
            6 => 'Cadeira',
            7 => 'Mouse',
            8 => 'Teclado',
            9 => 'Suporte Notebook',
            10 => 'Kit Boas Vindas',
            11 => 'Outros'
        ];

        $equipamento = EquipamentosServices::getDetails( $idEquipamento );

        return view('admin.equipamentos.update')->with(['equipamento' => $equipamento, 'tipo_equipamento' => $tipo_equipamento]);
    }

    /**
     * Atualiza um equipamento atraves do seu ID
     *
     * @param  \App\Http\Requests\UpdateEquipamentosRequest  $request
     * @param  \App\Models\Equipamentos  $equipamentos
     */
    public function update(UpdateEquipamentosRequest $request) {
        EquipamentosServices::update($request->idEquipamento, $request);

        return redirect()->route('equipamentos.index');
    }
}
