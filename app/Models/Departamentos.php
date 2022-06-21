<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;

    protected $fillable = ['nome_departamento'];

    public function Cargos()
    {
        return $this->hasMany(Cargos::class, 'departamentos_id', 'id');
    }
}
