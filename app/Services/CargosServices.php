<?php

namespace App\Services;

use App\Models\Cargos;
use App\Repository\Cargos\CargosRepository;
use Illuminate\Support\Facades\DB;

class CargosServices
{
    public static function store(object $request)
    {
        try {
            DB::beginTransaction();

            $dados['departamentos_id'] = $request->departamento;
            $dados['cargo'] = $request->cargo;

            ( new CargosRepository( new Cargos() ) )->store($dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Cargo cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getWithPagination()
    {
        return ( new CargosRepository( new Cargos ) )->getWithPagination();
    }

    public static function getDetails(int $id)
    {
        try {
            return ( new CargosRepository( new Cargos ) )->getDetails($id);
        } catch(\Exception $e) {
            return false;
        }
    }

    public static function update(object $request)
    {
        try {
            DB::beginTransaction();

            $dados['departamentos_id'] = $request->departamento ?? $request->departamento_atual;
            $dados['cargo'] = $request->cargo;

            ( new CargosRepository( new Cargos ) )->update($request->idCargo, $dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Cargo atualizado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFalsh', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getCargos(string $search)
    {
        return (new CargosRepository(new Cargos))->getCargos($search);
    }
}
