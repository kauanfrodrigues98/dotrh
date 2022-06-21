<?php

namespace App\Repository\PontosManuais;

use Illuminate\Database\Eloquent\Model;

class PontosManuaisRepository implements PontosManuaisInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $dados
     */
    final public function store(array $dados)
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
     * @return object
     */
    final public function getDetails(int $id): object
    {
        return $this->model->find($id)->first();
    }
}
