<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( Schema::hasTable('users') ) {
            Schema::table('users', function ( Blueprint $table ) {
                $table->date('data_nascimento')->nullable();
                $table->tinyinteger('sexo')->nullable();
                $table->string('nome_mae', 150)->nullable();
                $table->tinyinteger('estado_civil')->nullable();
                $table->string('naturalidade', 100)->nullable();
                $table->string('nacionalidade', 100)->nullable();
                $table->tinyinteger('pep')->nullable();
                $table->string('cep', 10)->nullable();
                $table->string('logradouro', 150)->nullable();
                $table->string('numero', 5)->nullable();
                $table->string('bairro', 100)->nullable();
                $table->string('cidade', 100)->nullable();
                $table->char('uf', 2)->nullable();
                $table->string('complemento', 150)->nullable();
                $table->string('cpf', 14)->nullable();
                $table->string('rg', 20)->nullable();
                $table->string('orgao_emissor', 3)->nullable();
                $table->date('data_emissao_rg')->nullable();
                $table->tinyinteger('possui_cnh')->nullable();
                $table->string('categoria_cnh', 10)->nullable();
                $table->string('numero_cnh', 50)->nullable();
                $table->date('data_primeira_cnh')->nullable();
                $table->date('data_vencimento_cnh')->nullable();
                $table->string('pis_pasep', 20)->nullable();
                $table->string('numero_ctps', 20)->nullable();
                $table->string('serie_ctps', 10)->nullable();
                $table->char('uf_ctps', 2)->nullable();
                $table->date('data_emissao_ctps')->nullable();
                $table->string('cartao_sus', 20)->nullable();
                $table->tinyinteger('lider')->nullable();
                $table->foreignIdFor(User::class); // Lider Responsável
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
        //
    }
};
