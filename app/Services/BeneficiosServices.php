<?php

namespace App\Services;

use App\Http\Requests\StoreBeneficiosRequest;
use App\Http\Requests\UpdateBeneficiosRequest;
use App\Models\Beneficios;
use App\Models\User;
use App\Repository\Beneficios\BeneficiosRepository;
use Illuminate\Support\Facades\DB;

class BeneficiosServices {

    /**
     * Insere os dados de criação de um novo beneficio
     *
     * @param StoreBeneficiosRequest $request
     * @return bool
     */
    public static function store(StoreBeneficiosRequest $request): bool {
        try {
            DB::beginTransaction();

            $dados['nome_beneficio']    = $request->nome_beneficio;
            $dados['havera_desconto']   = $request->havera_desconto ?? 0;
            $dados['valor_desconto']    = !empty($request->valor_desconto) ? self::brl2decimal($request->valor_desconto, 2) : 0.00;
            $dados['valor_beneficio']   = !empty($request->valor_beneficio) ? self::brl2decimal($request->valor_beneficio, 2) : 0.00;
            $dados['tipo_beneficio']    = $request->tipo_beneficio;
            $dados['outro_beneficio']   = $request->outro_beneficio;
            $dados['status']            = 1;
            $dados['detalhes']          = $request->detalhes;

            (new BeneficiosRepository(new Beneficios))->store( $dados );

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Beneficio cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel cadastrar novo benefício.');
            $request->session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * Converte moeda BR para SQL
     *
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

    /**
     * @return mixed
     */
    public static function getWithPagination(): mixed {
        try {
            return (new BeneficiosRepository(new Beneficios))->getWithPagination();
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param int $idBeneficio
     * @return mixed
     */
    public static function getDetails(int $idBeneficio): mixed {
        try {
            return (new BeneficiosRepository(new Beneficios))->getDetails($idBeneficio);
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * @param int $idBeneficio
     * @param UpdateBeneficiosRequest $request
     * @return bool
     */
    public static function update(int $idBeneficio, UpdateBeneficiosRequest $request): bool {
        try {
            DB::beginTransaction();

            $dados['nome_beneficio']    = $request->nome_beneficio;
            $dados['havera_desconto']   = $request->havera_desconto ?? 0;
            $dados['valor_desconto']    = !empty($request->valor_desconto) ? self::brl2decimal($request->valor_desconto, 2) : 0.00;
            $dados['valor_beneficio']   = !empty($request->valor_beneficio) ? self::brl2decimal($request->valor_beneficio, 2) : 0.00;
            $dados['tipo_beneficio']    = $request->tipo_beneficio;
            $dados['outro_beneficio']   = $request->outro_beneficio;
            $dados['status']            = 1;
            $dados['detalhes']          = $request->detalhes;

            (new BeneficiosRepository(new Beneficios))->update($idBeneficio, $dados);

            DB::commit();
            $request->session()->flash('responseFlash', 'true');
            $request->session()->flash('msgFlash', 'Dados atualizados com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            $request->session()->flash('responseFlash', 'false');
            $request->session()->flash('msgFlash', 'Não foi possivel atualizar os dados solicitados.');
            $request->session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }
}
