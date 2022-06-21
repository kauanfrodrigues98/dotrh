<?php

namespace App\Services;

use App\Http\Requests\StorePontosRequest;
use App\Models\Pontos;
use App\Repository\Pontos\PontosRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\HorasAjustadasServices;

class PontosServices {

    /**
     * @param $request
     * @return bool
     */
    public static function store(StorePontosRequest $request): bool {
        try {
            DB::beginTransaction();

            // Verifica na tabela qual o tipo da ultima marcação para que seja definida corretamente o tipo da próxima
            $checkLastPoint = ( new PontosRepository( new Pontos ) )->checkLastPoint( Auth::id() );

            if( !empty($checkLastPoint) ) {
                // E - Entrada / SA - Saida Almoço / EA - Entrada Almoço / S - Saída / HE - Hora Extra
                switch ( $checkLastPoint->tipo ) {
                    case 'E':
                        $dados['tipo'] = 'S';
                        break;
                    case 'S':
                        $dados['tipo'] = 'E';
                        break;
                }
            } else {
                $dados['tipo'] = 'E';
            }

            $dados['user_id']       = Auth::id();
            $dados['dia']           = date('Y-m-d');
            $dados['hora']          = $request->ponto;
            $dados['dispositivo']   = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
            $dados['ip']            = $_SERVER['REMOTE_ADDR'];

            (new PontosRepository( new Pontos ))->store($dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Ponto registrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', $e->getMessage());
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * Recupera os dados cadastrados do banco de dados
     */
    public static function getWithPagination(){
        try {
            return (new PontosRepository( new Pontos ))->getWithPagination(Auth::id());
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    /**
     * Recupera uma marcação de ponto através de seu ID
     *
     * @param int $id
     */
    public static function getDetails(int $id) {
        try {
            return (new PontosRepository( new Pontos ))->getDetails($id);
        } catch(\Exception $e) {
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function update( int $id, $request ) {
        try {
            DB::beginTransaction();

            $ponto = ( new PontosRepository( new Pontos ) )->getDetails($id);

            HorasAjustadasServices::store($id, $ponto, $request->motivo);

            $dados['dia']           = implode("-", array_reverse( explode("/", $request->dia) ) );
            $dados['hora']          = $request->hora;
            $dados['motivo']        = $request->motivo;
            $dados['dispositivo']   = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ?? 'Não Reconhecido';
            $dados['ip']            = $_SERVER['REMOTE_ADDR'];

            ( new PontosRepository( new Pontos ) )->update( $id, $dados );

            if($request->hasFile('anexos')) {
                $user = Auth::id();
                $dataPonto = explode('/', $request->dia);
                $dados = [];

                foreach($request->anexos as $anexo) {
                    $name = uniqid(date('HisYmd'));
                    $originalName = str_replace(' ', '_', $anexo->getClientOriginalName());

                    $nameFile = $name . '_' . $originalName;
                    $path = 'declaracoes/' . $user . '_' . str_replace(' ', '_', Auth::user()->name) . '/' . $dataPonto[2] . '/' . $dataPonto[1] . '/' . $dataPonto[0];
                    $upload = $anexo->storeAs($path, $nameFile);
                    if(!$upload) {
                        Session()->flash('responseFlash', 'false');
                        Session()->flash('msgFlash', 'Não foi possivel salvar os arquivos em anexo.');
                        return false;
                    }

                    $dados['ponto_id'] = $id;
                    $dados['path'] = $path;
                    $dados['nome_arquivo'] = $anexo->getClientOriginalName();
                    $dados['nome_path'] = $nameFile;
                    $dados['tipo'] = 1;

                    ArquivosServices::store($dados);
                }
            }

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Dados atualizados com sucesso.');
            return true;
        } catch( \Exception $e ) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
//            Session()->flash('msgFlash', 'Não foi possivel atualizar os dados solicitados.');
            Session()->flash('msgFlash', $e->getMessage());
            return false;
        }
    }
}
