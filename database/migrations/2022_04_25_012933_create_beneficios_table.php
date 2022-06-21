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
        if(!Schema::hasTable('beneficios')) {
            Schema::create('beneficios', function (Blueprint $table) {
                $table->id();
                $table->string('nome_beneficio', 150)->nullable(false);
                $table->boolean('havera_desconto')->default(0);
                $table->decimal('valor_desconto', 8, 2)->default(0);
                $table->tinyInteger('tipo_beneficio')->nullable(true);
                $table->string('outro_beneficio', 100)->nullable(true);
                $table->decimal('valor_beneficio')->default(0);
                $table->boolean('status')->nullable(false)->default(1);
                $table->string('detalhes', 150)->nullable(true);
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
        Schema::dropIfExists('beneficios');
    }
};
