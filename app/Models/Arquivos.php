<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    use HasFactory;

    protected $fillable = ['ponto_id', 'path', 'nome_arquivo', 'nome_path', 'tipo'];
}
