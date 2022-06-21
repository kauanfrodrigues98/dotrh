<?php

namespace App\Repository\Departamentos;

use Illuminate\Database\Eloquent\Model;

class DepartamentosRepository implements DepartamentosInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $dados
     * @return bool
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
        return $this->model->select('id', 'nome_departamento')->get();
    }

    /**
     * @param int $id
     * @return object
     */
    final public function getDetails(int $id): object
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @param array $dados
     * @return string
     */
    final public function update(int $id, array $dados): string
    {
        return $this->model->find($id)->update($dados);
    }

    /**
     * @param string $search
     * @return object
     */
    final public function getDepartamentos(string $search): object
    {
        if(empty($search))
        {
            return $this->model->select('id', 'nome_departamento')->limit(20)->get();
        } else {
            return $this->model->select('id', 'nome_departamento')->where([['nome_departamento', 'like' , '%'.$search.'%']])->limit(20)->get();
        }
    }
}
