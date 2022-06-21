<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('equipamentos')) {
            Schema::create('equipamentos', function (Blueprint $table) {
                $table->id();
                $table->string('nome_equipamento', 150)->nullable();
                $table->decimal('valor_equipamento', 8, 2)->default(0);
                $table->integer('tipo_equipamento')->nullable(true);
                $table->string('outro_tipo_equipamento', 100)->nullable();
                $table->string('tag_identificacao', 50)->nullable();
                $table->string('detalhes', 200)->nullable();
                $table->boolean('status')->default(1);
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
        Schema::dropIfExists('equipamentos');
    }
};
