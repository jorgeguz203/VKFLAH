<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosPapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_papes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materialpapelera_id')->unsigned()->nullable();
            $table->foreign('materialpapelera_id')->references('id')
                ->on('materialpapeleras')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->string('nombre_user');
            $table->string('nombre_material');
            $table->string('area');
            $table->float('cantidad');
            $table->string('observaciones');
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
        Schema::dropIfExists('pedidos_papes');
    }
}