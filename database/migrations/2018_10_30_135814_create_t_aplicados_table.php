<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAplicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_aplicados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->string('precio')->nullable();
            $table->integer('unidad_id')->unsigned()->nullable();

            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('t_aplicado_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('t_aplicado_id')->unsigned();
            $table->string('cantidad')->nullable();
            $table->string('monto')->nullable();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('t_aplicado_id')->references('id')->on('t_aplicados')->onDelete('cascade');
            
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
        Schema::dropIfExists('t_aplicado_pedido');
        Schema::dropIfExists('t_aplicados');
    }
}
