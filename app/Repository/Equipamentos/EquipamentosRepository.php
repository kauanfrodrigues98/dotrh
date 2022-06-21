<?php

namespace App\Repository\Equipamentos;

use Illuminate\Database\Eloquent\Model;

class EquipamentosRepository implements EquipamentosInterface
{
    /**
     * @var Model
     */
    private Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model ) {
        $this->model = $model;
    }

    /**
     * @param array $dados
     * @return mixed
     */
    final public function store(array $dados ): mixed {
        return $this->model->create( $dados );
    }

    /**
     * @return mixed
     */
    final public function getWithPagination(): mixed {
        return $this->model
                    ->select(
                        'id',
                        'nome_equipamento',
                        'tipo_equipamento',
                        'valor_equipamento',
                        'tag_identificacao',
                        'status'
                    )->paginate();
    }

    /**
     * @param int $idEquipamento
     * @return mixed
     */
    final public function getDetails(int $idEquipamento ): mixed {
        return $this->model->find( $idEquipamento )->first();
    }

    /**
     * @param int $idEquipamento
     * @param array $dados
     * @return mixed
     */
    final public function update(int $idEquipamento, array $dados): mixed {
        return $this->model->find( $idEquipamento )->update( $dados );
    }
}
