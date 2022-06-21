<?php

namespace App\Repository\Pontos;

use Illuminate\Database\Eloquent\Model;

class PontosRepository implements PontosInterface
{
    private Model $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    /**
     * @param array $dados
     * @return mixed
     */
    final public function store(array $dados): mixed {
        return $this->model->create($dados);
    }

    /**
     * @param int $id
     * @return mixed
     */
    final public function getWithPagination(int $id): mixed {
        return $this->model->where('user_id', $id)->orderBy('hora', 'desc')->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    final public function getDetails( int $id ): mixed {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param int $id
     * @return mixed
     */
    final public function checkLastPoint(int $id): mixed {
        return $this->model->select('tipo')
                    ->where([['user_id', '=', $id], ['dia', '=', date('Y-m-d')]])
                    ->orderBy('id', 'desc')
                    ->first();
    }

    /**
     * @param int $id
     * @param array $dados
     * @return mixed
     */
    final public function update(int $id, array $dados): mixed {
        return $this->model->find($id)->update($dados);
    }
}
