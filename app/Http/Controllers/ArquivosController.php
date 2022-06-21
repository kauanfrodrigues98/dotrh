<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArquivosRequest;
use App\Http\Requests\UpdateArquivosRequest;
use App\Models\Arquivos;
use App\Services\ArquivosServices;
use Illuminate\Support\Facades\Storage;

class ArquivosController extends Controller
{
    public function download(int $id)
    {
        $result = ArquivosServices::download($id);

        return Storage::download($result['path'], $result['nome']);
    }
}
