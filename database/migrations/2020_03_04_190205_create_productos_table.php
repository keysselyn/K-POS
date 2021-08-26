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
            $table->id();
            $table->string("descripcion");
            $table->string("codigo_barras");
            $table->integer("familia");
            $table->decimal("precio_compra", 9, 2);
            $table->decimal("precio_venta", 9, 2);
            $table->integer("itbis");
            $table->decimal("existencia", 9, 2);
            $table->decimal("existencia_minima", 9, 2);
            $table->string("imagen")->nullable();
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
        Schema::dropIfExists('productos');
    }
}
