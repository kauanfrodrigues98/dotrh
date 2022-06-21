<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $fillable = ['departamentos_id', 'cargo'];

    protected $hidden = ['departamentos_id'];

    public function Departamentos()
    {
        return $this->belongsTo(Departamentos::class, 'departamentos_id', 'id');
    }
}
