<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_equipamento',
        'valor_equipamento',
        'tipo_equipamento',
        'outro_tipo_equipamento',
        'tag_identificacao',
        'detalhes'
    ];
}
