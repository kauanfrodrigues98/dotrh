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
        if(Schema::hasTable('users'))
        {
            Schema::table('users', function(Blueprint $table) {
                $table->char('nivel_acesso', 1)
                    ->nullable()
                    ->default(3)
                    ->comment("1-Administrador | 2-Lider | 3-Funcionario")
                    ->after('remember_token');
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('nivel_acesso');
        });
    }
};
