<?php

namespace App\Services;

use App\Models\Departamentos;
use Illuminate\Support\Facades\DB;
use App\Repository\Departamentos\DepartamentosRepository;

class DepartamentosServices
{
    public static function store(object $request)
    {
        try {
            DB::beginTransaction();

            $dados['nome_departamento'] = $request->departamento;

            ( new DepartamentosRepository( new Departamentos ) )->store($dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Departamentos cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel cadastrar novo departamento.');
            Session()->flash('msgFlash', $e->getMessage());
            return false;
        }
    }

    public static function getWithPagination()
    {
        try {
            return ( new DepartamentosRepository( new Departamentos ) )->getWithPagination();
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param int $id
     * @return false|object
     */
    public static function getDetails(int $id): false|object
    {
        try {
            return ( new DepartamentosRepository( new Departamentos ) )->getDetails($id);
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function update(object $request)
    {
        try {
            DB::beginTransaction();

            $dados['nome_departamento'] = $request->departamento;

            ( new DepartamentosRepository( new Departamentos ) )->update($request->idDepartamento, $dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Dados atualizados com sucesso.');
            return true;
        } catch(\Exception $e) {
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getDepartamentos(string $search)
    {
        return ( new DepartamentosRepository( new Departamentos ) )->getDepartamentos($search);
    }
}
