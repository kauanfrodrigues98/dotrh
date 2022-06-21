<?php

namespace App\Repository\Users;

class UsersRepository implements UsersInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findByEmail(String $email)
    {
        return $this->model->select(['name', 'email'])->where('email', $email)->first();
    }

    public function store(array $dados)
    {
        return $this->model->create($dados);
    }

    public function getWithPagination()
    {
        return $this->model->select('id', 'name', 'email')->paginate(50);
    }

    public function getDetails(int $id)
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $dados)
    {
        return $this->model->where('id', $id)->update($dados);
    }

    public function getLiderResponsavel()
    {
        return $this->model->select('id', 'name')->limit(20)->get();
    }

    public function getLiderUser( int $id )
    {
        return $this->model->select('name')->where('user_id', $id)->first();
    }

    public function updateSenha( int $id, array $dados )
    {
        return $this->model->find($id)->update( $dados );
    }
}
