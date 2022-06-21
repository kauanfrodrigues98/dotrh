<?php

namespace App\Repository\Arquivos;

interface ArquivosInterface
{
    /**
     * @param array $dados
     * @return mixed
     */
    public function store(array $dados): mixed;

    public function getDetails(int $id, int $flag);

    public function download(int $id);
}
