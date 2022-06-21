<?php

namespace App\Repository\PontosManuais;

interface PontosManuaisInterface
{
    /**
     * @param array $dados
     */
    public function store(array $dados);

    /**
     * @return object
     */
    public function getWithPagination(): object;

    /**
     * @param int $id
     * @return object
     */
    public function getDetails(int $id): object;
}
