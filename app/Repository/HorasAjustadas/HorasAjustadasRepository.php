<?php

namespace App\Repository\HorasAjustadas;

use Illuminate\Database\Eloquent\Model;

class HorasAjustadasRepository implements HorasAjustadasInterface {
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
}