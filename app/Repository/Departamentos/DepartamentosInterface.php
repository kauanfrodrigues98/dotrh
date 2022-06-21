<?php

namespace App\Repository\Departamentos;

interface DepartamentosInterface
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
     * @return string
     */
    public function update(int $id, array $dados): string;

    /**
     * @param string $search
     * @return object
     */
    public function getDepartamentos(string $search): object;
}
