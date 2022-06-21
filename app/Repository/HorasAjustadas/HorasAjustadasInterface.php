<?php

namespace App\Repository\HorasAjustadas;

interface HorasAjustadasInterface {
    /**
     * @param array $dados
     * @return mixed
     */
    public function store(array $dados):mixed;
}