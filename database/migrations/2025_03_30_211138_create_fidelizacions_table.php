<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFidelizacionsTable extends Migration // Cambia el nombre si es necesario
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidelizacion', function (Blueprint $table) {
            $table->id();
            $table->string('finalidad');
            $table->integer('puntos_totales');
            $table->integer('limite_puntos');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fidelizacion');
    }
}
