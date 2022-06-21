<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentosRequest;
use App\Http\Requests\UpdateDepartamentosRequest;
use App\Models\Departamentos;
use App\Services\DepartamentosServices;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = DepartamentosServices::getWithPagination();

        return view('admin.departamentos.index')->with(['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departamentos.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartamentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartamentosRequest $request)
    {
        DepartamentosServices::store($request);

        return redirect()->route('departamentos.cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $departamento = DepartamentosServices::getDetails($id);

        return view('admin.departamentos.update')->with(['departamento' => $departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamentos $departamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartamentosRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDepartamentosRequest $request)
    {
        DepartamentosServices::update($request);
        return redirect()->route('departamentos.detalhes', ['id' => $request->idDepartamento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamentos $departamentos)
    {
        //
    }

    public function getDepartamentos()
    {
        $search = $_GET['search'] ?? '';

        return DepartamentosServices::getDepartamentos($search);
    }
}
