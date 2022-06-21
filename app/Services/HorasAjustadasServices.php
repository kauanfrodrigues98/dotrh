<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repository\HorasAjustadas\HorasAjustadasRepository;
use App\Models\HorasAjustadas;

class HorasAjustadasServices {
    public static function store(int $id, object $ponto, string $motivo) {
        try {
            DB::beginTransaction();

            $dados['pontos_id'] = $id;
            $dados['dia'] = $ponto->dia;
            $dados['hora'] = $ponto->hora;
            $dados['dispositivo'] = $ponto->dispositivo;
            $dados['ip'] = $ponto->ip;
            $dados['tipo'] = $ponto->tipo;
            $dados['motivo'] = $motivo;

            ( new HorasAjustadasRepository( new HorasAjustadas ) )->store($dados);

            DB::commit();
            return true;
        } catch( \Exception $e ) {
            DB::rollBack();
            return false;
        }
    }
}