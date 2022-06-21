<?php

namespace App\Services;

use App\Http\Requests\StoreEquipamentosRequest;
use App\Http\Requests\UpdateEquipamentosRequest;
use App\Models\Equipamentos;
use App\Repository\Equipamentos\EquipamentosRepository;
use Illuminate\Support\Facades\DB;

class EquipamentosServices {

    /**
     * @param StoreEquipamentosRequest $request
     * @return bool
     */
    public static function store(StoreEquipamentosRequest $request): bool {
        try {
            DB::beginTransaction();

            $dados['nome_equipamento'] = $request->nome_equipamento;
            $dados['valor_equipamento'] = self::brl2decimal($request->valor_equipamento, 2);
            $dados['tipo_equipamento'] = $request->tipo_equipamento;
            $dados['outro_tipo_equipamento'] = $request->outro_tipo_equipamento;
            $dados['tag_identificacao'] = $request->tag_identificacao;
            $dados['detalhes'] = $request->detalhes;

            ( new EquipamentosRepository( new Equipamentos ) )->store($dados);

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Equipamento cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel cadastrar novo equipamento.');
            $request->session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @return mixed
     */
    public static function getWithPagination(): mixed {
        try {
            return (new EquipamentosRepository(new Equipamentos))->getWithPagination();
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param int $idEquipamento
     * @return mixed
     */
    public static function getDetails(int $idEquipamento ): mixed {
        try {
            return ( new EquipamentosRepository( new Equipamentos ) )->getDetails( $idEquipamento );
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param int $id
     * @param UpdateEquipamentosRequest $request
     * @return bool
     */
    public static function update(int $id, UpdateEquipamentosRequest $request): bool {
        try {
            DB::beginTransaction();

            $dados['nome_equipamento'] = $request->nome_equipamento;
            $dados['valor_equipamento'] = self::brl2decimal($request->valor_equipamento, 2);
            $dados['tipo_equipamento'] = $request->tipo_equipamento;
            $dados['outro_tipo_equipamento'] = $request->outro_tipo_equipamento;
            $dados['detalhes'] = $request->detalhes;

            ( new EquipamentosRepository( new Equipamentos ) )->update($id, $dados);

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Equipamento atualizado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel atualizar equipamento.');
            $request->session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param String $brl
     * @param int $casasDecimais
     * @return float
     */
    private static function brl2decimal(String $brl, int $casasDecimais = 2): float {
        // Se já estiver no formato USD, retorna como float e formatado
        if(preg_match('/^\d+\.{1}\d+$/', $brl))
            return (float) number_format($brl, $casasDecimais, '.', '');
        // Tira tudo que não for número, ponto ou vírgula
        $brl = preg_replace('/[^\d\.\,]+/', '', $brl);
        // Tira o ponto
        $decimal = str_replace('.', '', $brl);
        // Troca a vírgula por ponto
        $decimal = str_replace(',', '.', $decimal);
        return (float) number_format($decimal, $casasDecimais, '.', '');
    }
}
