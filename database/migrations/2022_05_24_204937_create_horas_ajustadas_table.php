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
        if(!Schema::hasTable('horas_ajustadas')) {
            Schema::create('horas_ajustadas', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Pontos::class);
                $table->date('dia', 2)->nullable();
                $table->time('hora')->nullable();
                $table->string('dispositivo', 30)->nullable();
                $table->string('ip', 15)->nullable();
                $table->string('tipo', 5)->nullable();
                $table->string('motivo', 150)->nullable();
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
        Schema::dropIfExists('horas_ajustadas');
    }
};
