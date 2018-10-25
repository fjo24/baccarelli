<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_dias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia');
            $table->timestamps();
        });

        Schema::create('entrega_dia_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entrega_dia_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->timestamps();

            $table->foreign('entrega_dia_id')->references('id')->on('entrega_dias')->onDelete('cascade');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('=entrega_dias');
    }
}
