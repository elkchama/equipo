<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Clave foránea para relacionar el producto con una tienda
            $table->unsignedBigInteger('tienda_id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            // Precio con 8 dígitos en total y 2 decimales
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            // Definición de la clave foránea y acción en cascada
            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
