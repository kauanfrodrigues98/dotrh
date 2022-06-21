<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCargosRequest;
use App\Http\Requests\UpdateCargosRequest;
use App\Models\Cargos;
use App\Models\Departamentos;
use App\Services\CargosServices;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = CargosServices::getWithPagination();

        return view('admin.cargos.index')->with(['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.cargos.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCargosRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCargosRequest $request)
    {
        CargosServices::store($request);

        return redirect()->route('cargos.cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $cargo = CargosServices::getDetails($id);

        return view('admin.cargos.update')->with(['cargo' => $cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalhes()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCargosRequest  $request
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCargosRequest $request)
    {
        CargosServices::update($request);

        return redirect()->route('cargos.detalhes', ['id' => $request->idCargo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargos $cargos)
    {
        //
    }

    public function getCargos()
    {
        $search = $_GET['search'] ?? '';
        return CargosServices::getCargos($search);
    }
}
