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
        Schema::create('busqueda_tiendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('busqueda_id')
                  ->constrained('busquedas')
                  ->onDelete('cascade');
            $table->foreignId('tienda_id')
                  ->constrained('tiendas')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('busqueda_tiendas');
    }
};
