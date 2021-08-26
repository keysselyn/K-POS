<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social', 150);
            $table->string('rnc_cedula', 15);
            $table->string('telefono', 15)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('municipio', 50)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('imagen', 100)->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
