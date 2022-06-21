<?php

namespace App\Repository\Pontos;

interface PontosInterface {
    /**
     * @param array $dados
     * @return mixed
     */
    public function store( array $dados ):mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function getWithPagination(int $id):mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function getDetails(int $id):mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function checkLastPoint(int $id):mixed;

    /**
     * @param int $id
     * @param array $dados
     * @return mixed
     */
    public function update(int $id, array $dados):mixed;
}
