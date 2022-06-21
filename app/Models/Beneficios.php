<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficios extends Model
{
    use HasFactory;

    protected $fillable = ['nome_beneficio', 'havera_desconto', 'valor_desconto', 'tipo_beneficio', 'outro_beneficio',
        'valor_beneficio', 'detalhes', 'status'];
}
