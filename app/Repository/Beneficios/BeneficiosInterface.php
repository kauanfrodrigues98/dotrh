<?php

namespace App\Repository\Beneficios;

interface BeneficiosInterface {
    /**
     * @param String $nome_beneficio
     * @return mixed
     */
    public function findBeneficeExist(String $nome_beneficio): mixed;

    /**
     * @param array $request
     * @return mixed
     */
    public function store(array $request): mixed;

    /**
     * @return mixed
     */
    public function getWithPagination(): mixed;

    /**
     * @param int $idBeneficio
     * @return mixed
     */
    public function getDetails(int $idBeneficio): mixed;

    /**
     * @param int $idBeneficio
     * @param array $dados
     * @return mixed
     */
    public function update(int $idBeneficio, array $dados): mixed;
}
