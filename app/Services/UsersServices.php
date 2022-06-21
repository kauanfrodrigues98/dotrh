<?php

namespace App\Services;

use App\Models\User;
use App\Repository\Users\UsersRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersServices {
    public static function store($request):bool {
        try {
            DB::beginTransaction();

            $repository = new UsersRepository(new User);

            if( !empty($repository->findByEmail($request->email)) ) {
                $request->session()->flash('responseFlash', 'false');
                $request->session()->flash('msgFlash', 'E-mail já cadastrado em nosso sistema.');
                return false;
            }

            $dados['name'] = $request->nome_completo;
            $dados['email'] = $request->email;
            $dados['data_nascimento'] = $request->data_nascimento;
            $dados['sexo'] = $request->sexo;
            $dados['nome_mae'] = $request->nome_mae;
            $dados['estado_civil'] = $request->estado_civil;
            $dados['naturalidade'] = $request->naturalidade;
            $dados['nacionalidade'] = $request->nacionalidade;
            $dados['pep'] = $request->pep;
            $dados['cep'] = $request->cep;
            $dados['logradouro'] = $request->logradouro;
            $dados['numero'] = $request->numero;
            $dados['bairro'] = $request->bairro;
            $dados['cidade'] = $request->cidade;
            $dados['uf'] = $request->uf;
            $dados['complemento'] = $request->complemento;
            $dados['cpf'] = $request->cpf;
            $dados['rg'] = $request->rg;
            $dados['orgao_emissor'] = $request->orgao_emissor;
            $dados['data_emissao_rg'] = $request->data_emissao_rg;
            $dados['possui_cnh'] = $request->possui_cnh;
            $dados['categoria_cnh'] = $request->categoria_cnh;
            $dados['numero_cnh'] = $request->numero_cnh;
            $dados['data_primeira_cnh'] = $request->data_primeira_cnh;
            $dados['data_vencimento_cnh'] = $request->data_vencimento_cnh;
            $dados['pis_pasep'] = $request->pis_pasep;
            $dados['numero_ctps'] = $request->numero_ctps;
            $dados['serie_ctps'] = $request->serie_ctps;
            $dados['uf_ctps'] = $request->uf_ctps;
            $dados['data_emissao_ctps'] = $request->data_emissao_ctps;
            $dados['cartao_sus'] = $request->cartao_sus;
            $dados['lider'] = $request->lider;
            $dados['user_id'] = $request->lider_responsavel; // Lider Responsavel
            $dados['password'] = Hash::make($request->senha);

            $repository->store($dados);

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Usuário cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel cadastrar novo usuário.');
            $request->session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getWithPagination():mixed {
        try {
            $repository = new UsersRepository(new User);

            return $repository->getWithPagination();
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getDetails(int $id):mixed {
        try {
            return ( new UsersRepository(new User) )->getDetails($id);
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function update(int $id, $request):bool {
        try {
            DB::beginTransaction();

            $repository = new UsersRepository(new User);

            $dados['name'] = $request->nome_completo;
            $dados['email'] = $request->email;
            $dados['data_nascimento'] = $request->data_nascimento;
            $dados['sexo'] = $request->sexo;
            $dados['nome_mae'] = $request->nome_mae;
            $dados['estado_civil'] = $request->estado_civil;
            $dados['naturalidade'] = $request->naturalidade;
            $dados['nacionalidade'] = $request->nacionalidade;
            $dados['pep'] = $request->pep;
            $dados['cep'] = $request->cep;
            $dados['logradouro'] = $request->logradouro;
            $dados['numero'] = $request->numero;
            $dados['bairro'] = $request->bairro;
            $dados['cidade'] = $request->cidade;
            $dados['uf'] = $request->uf;
            $dados['complemento'] = $request->complemento;
            $dados['cpf'] = $request->cpf;
            $dados['rg'] = $request->rg;
            $dados['orgao_emissor'] = $request->orgao_emissor;
            $dados['data_emissao_rg'] = $request->data_emissao_rg;
            $dados['possui_cnh'] = $request->possui_cnh;
            $dados['categoria_cnh'] = $request->categoria_cnh;
            $dados['numero_cnh'] = $request->numero_cnh;
            $dados['data_primeira_cnh'] = $request->data_primeira_cnh;
            $dados['data_vencimento_cnh'] = $request->data_vencimento_cnh;
            $dados['pis_pasep'] = $request->pis_pasep;
            $dados['numero_ctps'] = $request->numero_ctps;
            $dados['serie_ctps'] = $request->serie_ctps;
            $dados['uf_ctps'] = $request->uf_ctps;
            $dados['data_emissao_ctps'] = $request->data_emissao_ctps;
            $dados['cartao_sus'] = $request->cartao_sus;
            $dados['lider'] = $request->lider;
            $dados['user_id'] = $request->lider_responsavel; // Lider Responsavel

            $repository->update($id, $dados);

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Dados atualizados com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel atualizar os dados solicitados.');
            $request->session()->flash('msgFlash', $e->getMessage());
            return false;
        }
    }

    public static function getLiderResponsavel()
    {
        try {
            return ( new UsersRepository( new User ) )->getLiderResponsavel();
        } catch( \Exception $e ) {
            return $e->getMessage();
        }
    }

    public static function getLiderUser( int $id )
    {
        try {
            return ( new UsersRepository( new User ) )->getLiderUser( $id );
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateSenha( $request )
    {
        try {
            DB::beginTransaction();

            $dados['password'] = Hash::make( $request->password );

            ( new UsersRepository( new User ) )->updateSenha( Auth::id(), $dados );

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Senha atualizada com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel atualizar senha.');
            $request->session()->flash('msgFlash', $e->getMessage());
            return false;
        }
    }
}
