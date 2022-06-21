<?php

namespace App\Services;

use App\Models\Pontos;
use App\Models\PontosManuais;
use App\Repository\Pontos\PontosRepository;
use App\Repository\PontosManuais\PontosManuaisRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PontosManuaisServices
{
    public static function store(object $request) {
        try {
            DB::beginTransaction();

            $dados['user_id']       = Auth::id();
            $dados['dia']           = $request->dia;
            $dados['hora_saida']    = $request->hora_saida;
            $dados['hora_entrada']  = $request->hora_entrada;
            $dados['motivo']        = $request->motivo;
            $dados['dispositivo']   = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ?? 'Não Reconhecido';
            $dados['ip']            = $_SERVER['REMOTE_ADDR'];
            $dados['status']        = 1;

            $pontoResult = ( new PontosManuaisRepository( new PontosManuais ) )->store($dados);
            $pontoId = $pontoResult->id;

            if($request->hasFile('anexos')) {
                $user = Auth::id();
                $dataPonto = explode('-', $request->dia);

                foreach($request->anexos as $anexo) {
                    $name = uniqid(date('HisYmd'));
                    $originalName = str_replace(' ', '_', $anexo->getClientOriginalName());

                    $nameFile = $name . '_' . $originalName;
                    $path = 'declaracoes/' . $user . '_' . str_replace(' ', '_', Auth::user()->name) . '/' . $dataPonto[0] . '/' . $dataPonto[1] . '/' . $dataPonto[2];
                    $upload = $anexo->storeAs($path, $nameFile);
                    if(!$upload) {
                        Session()->flash('responseFlash', 'false');
                        Session()->flash('msgFlash', 'Não foi possivel salvar os arquivos em anexo.');
                        return false;
                    }

                    $dados['ponto_id'] = $pontoId;
                    $dados['path'] = $path;
                    $dados['nome_arquivo'] = $anexo->getClientOriginalName();
                    $dados['nome_path'] = $nameFile;
                    $dados['tipo'] = 2;

                    ArquivosServices::store($dados);
                }
            }

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Marcação de ponto manual realizada com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            Session()->flash('msgFlash', $e->getMessage());
            return false;
        }
    }

    public static function getWithPagination()
    {
        try {
            return ( new PontosManuaisRepository( new PontosManuais ) )->getWithPagination();
        } catch(\Exception $e) {
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            return false;
        }
    }

    public static function getDetails(int $id)
    {
        try {
            return ( new PontosManuaisRepository( new PontosManuais ) )->getDetails($id);
        } catch(\Exception $e) {
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possível concluir sua solicitação.');
            return false;
        }
    }
}
