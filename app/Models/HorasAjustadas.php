<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorasAjustadas extends Model
{
    use HasFactory;

    protected $fillable = ['pontos_id', 'dia', 'hora', 'dispositivo', 'ip', 'tipo', 'motivo'];
}
