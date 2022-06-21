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
        if(!Schema::hasTable('pontos')) {
            Schema::create('pontos', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class);
                $table->string('tipo', 5)->nullable(false);
                $table->date('dia')->nullable(false);
                $table->time('hora')->nullable(false);
                $table->string('dispositivo', 50)->nullable();
                $table->string('ip', 20)->nullable();
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
        Schema::dropIfExists('pontos');
    }
};
