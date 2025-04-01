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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
<<<<<<< HEAD
            $table->string('url')->nullable();
            $table->boolean('es_aliada')->default(0);
=======
            $table->string('url')->nullable(); // URL de la tienda
            $table->boolean('es_aliada')->default(false); // Indica si la tienda es aliada
>>>>>>> 86eb2605f661a4e01f0a052fe2ede7837e0dc568
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
        Schema::dropIfExists('tiendas');
    }
};
