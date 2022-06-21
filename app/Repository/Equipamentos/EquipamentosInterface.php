<?php

namespace App\Repository\Equipamentos;

interface EquipamentosInterface {

    /**
     * @param array $dados
     * @return mixed
     */
    public function store(array $dados):mixed;

    /**
     * @return mixed
     */
    public function getWithPagination():mixed;

    /**
     * @param int $idEquipamento
     * @return mixed
     */
    public function getDetails(int $idEquipamento ):mixed;

    /**
     * @param int $idEquipamento
     * @param array $dados
     * @return mixed
     */
    public function update(int $idEquipamento, array $dados):mixed;
}
