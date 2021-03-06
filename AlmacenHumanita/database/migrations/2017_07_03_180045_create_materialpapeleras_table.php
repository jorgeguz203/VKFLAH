<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialPapelerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialpapeleras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->float('maximo');
            $table->float('minimo');
            $table->float('existencia');
          //$table->integer('proveedor_id');
            $table->string('area')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->string('numero_referencia')->nullable();
            $table->string('presentacion')->nullable();
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
        Schema::dropIfExists('materialpapeleras');
    }
}
