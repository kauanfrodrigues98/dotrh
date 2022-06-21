<?php

namespace App\Repository\Beneficios;

use Illuminate\Database\Eloquent\Model;

class BeneficiosRepository implements BeneficiosInterface {

    private Model $model;

    public function __construct( Model $model ) {
        $this->model = $model;
    }

    /**
     * @param string $nome_beneficio
     * @return mixed
     */
    final public function findBeneficeExist(string $nome_beneficio): mixed {
        return $this->model->select('id', 'nome_beneficio')->where('nome_beneficio', $nome_beneficio)->first() ?? [];
    }

    /**
     * @param array $dados
     * @return mixed
     */
    final public function store(array $dados): mixed {
        return $this->model->create($dados);
    }

    /**
     * @return mixed
     */
    final public function getWithPagination(): mixed {
        return $this->model->select('id', 'nome_beneficio', 'havera_desconto', 'valor_desconto', 'valor_beneficio', 'tipo_beneficio', 'outro_beneficio', 'status')->paginate(50);
    }

    /**
     * @param int $idBeneficio
     * @return mixed
     */
    final public function getDetails(int $idBeneficio): mixed {
        return $this->model->where('id', $idBeneficio)->first();
    }

    /**
     * @param int $idBeneficio
     * @param array $dados
     * @return mixed
     */
    final public function update(int $idBeneficio, array $dados): mixed {
        return $this->model->find($idBeneficio)->update($dados);
    }
}
