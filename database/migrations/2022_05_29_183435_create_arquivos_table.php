<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pontos;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('arquivos'))
        {
            Schema::create('arquivos', function (Blueprint $table) {
                $table->id();
                $table->integer('ponto_id')->nullable();
                $table->string('path')->nullable();
                $table->string('nome_arquivo', 150)->nullable();
                $table->string('nome_path')->nullable();
                $table->tinyInteger('tipo')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
};
