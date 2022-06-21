<?php

namespace App\Repository\Cargos;

use Illuminate\Database\Eloquent\Model;

class CargosRepository implements CargosInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $dados
     * @return string
     */
    final public function store(array $dados): string
    {
        return $this->model->create($dados);
    }

    /**
     * @return object
     */
    final public function getWithPagination(): object
    {
        return $this->model->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    final public function getDetails(int $id): object
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @param array $dados
     * @return bool
     */
    final public function update(int $id, array $dados): bool
    {
        return $this->model->find($id)->update($dados);
    }

    final public function getCargos(string $search)
    {
        if(empty($search))
        {
            return $this->model
                        ->select('cargos.id', 'cargos.cargo', 'departamentos.nome_departamento')
                        ->join('departamentos', 'cargos.departamentos_id', '=', 'departamentos.id')
                        ->get();
        } else {
            return $this->model
                        ->select('cargos.id', 'cargos.cargo', 'departamentos.nome_departamento')
                        ->join('departamentos', 'cargos.departamentos_id', '=', 'departamentos.id')
                        ->where([['cargos.cargo', 'like', '%'.$search.'%']])
                        ->orWhere([['departamentos.nome_departamento', 'like', '%'.$search.'%']])
                        ->get();
        }
    }
}
