<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'data_nascimento',
        'sexo',
        'nome_mae',
        'estado_civil',
        'naturalidade',
        'nacionalidade',
        'pep',
        'cep','
        logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'cpf',
        'rg',
        'orgao_emissor',
        'data_emissao_cnh',
        'possui_cnh',
        'categoria_cnh',
        'numero_cnh',
        'data_primeira_cnh',
        'data_vencimento_cnh',
        'pis_pasep',
        'numero_ctps',
        'serie_ctps',
        'uf_ctps',
        'data_emissao_ctps',
        'cartao_sus',
        'lider',
        'user_id',
        'nivel_acesso'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Ponto() {
        return $this->hasMany(Pontos::class, 'user_id', 'id');
    }
}
