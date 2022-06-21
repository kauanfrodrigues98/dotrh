<?php

namespace App\Services;

use App\Models\Arquivos;
use App\Repository\Arquivos\ArquivosRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArquivosServices
{
    public static function store(array $dados)
    {
        try {
            DB::beginTransaction();

            ( new ArquivosRepository( new Arquivos ))->store($dados);

            DB::commit();
            Session()->flash('responseFlash', 'true');
            Session()->flash('msgFlash', 'Arquivo cadastrado com sucesso.');
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            Session()->flash('responseFlash', 'false');
            Session()->flash('msgFlash', 'Não foi possivel concluir sua solicitação.');
            Session()->flash('errorFlash', $e->getMessage());
            return false;
        }
    }

    public static function getDetails(int $id, int $flag)
    {
        return ( new ArquivosRepository( new Arquivos ) )->getDetails($id, $flag);
    }

    public static function download(int $id)
    {
        $arquivo = ( new ArquivosRepository( new Arquivos ) )->download($id);

        $pathComplete = $arquivo->path . '/' . $arquivo->nome_path;

        return ['path' => $pathComplete, 'nome' => $arquivo->nome_arquivo];
    }
}
