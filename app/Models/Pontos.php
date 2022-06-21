<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontos extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tipo', 'dia', 'hora', 'dispositivo', 'ip', 'status'];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
