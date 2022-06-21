<?php

namespace App\Repository\Cargos;

interface CargosInterface
{
    /**
     * @param array $dados
     * @return string
     */
    public function store(array $dados): string;

    /**
     * @return object
     */
    public function getWithPagination(): object;

    /**
     * @param int $id
     * @return object
     */
    public function getDetails(int $id): object;

    /**
     * @param int $id
     * @param array $dados
     * @return bool
     */
    public function update(int $id, array $dados): bool;

    public function getCargos(string $search);
}
