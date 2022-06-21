<?php

namespace App\Repository\Arquivos;

use Illuminate\Database\Eloquent\Model;

class ArquivosRepository implements ArquivosInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $dados
     * @return mixed
     */
    final public function store(array $dados): mixed
    {
        return $this->model->create($dados);
    }

    final public function getDetails(int $id, int $flag)
    {
        return $this->model->where(['ponto_id' => $id, 'tipo' => $flag])->get();
    }

    final public function download(int $id)
    {
        return $this->model->select('nome_path', 'path')->find($id)->first();
    }
}
