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
        if(!Schema::hasTable('pontos_manuais')) {
            Schema::create('pontos_manuais', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class);
                $table->date('dia')->nullable();
                $table->time('hora_saida')->nullable();
                $table->time('hora_entrada')->nullable();
                $table->string('dispositivo', 50)->nullable();
                $table->string('ip', 20)->nullable();
                $table->string('motivo')->nullable();
                $table->tinyInteger('status')->nullable()->default(1);
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
        Schema::dropIfExists('pontos_manuais');
    }
};
