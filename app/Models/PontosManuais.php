<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontosManuais extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'dia', 'hora_saida', 'hora_entrada', 'dispositivo', 'ip', 'motivo', 'status'];

    protected $hidden = ['user_id'];
}
