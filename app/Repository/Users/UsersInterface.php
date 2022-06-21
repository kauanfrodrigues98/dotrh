<?php

namespace App\Repository\Users;

interface UsersInterface
{
    public function findByEmail(String $email);

    public function store(array $dados);

    public function getWithPagination();

    public function getDetails(int $id);

    public function update(int $id, array $dados);

    public function getLiderResponsavel();

    public function getLiderUser( int $id );

    public function updateSenha( int $id, array $dados );
}
