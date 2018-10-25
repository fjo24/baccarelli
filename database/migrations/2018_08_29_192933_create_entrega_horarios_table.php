<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horario');
            $table->timestamps();
        });

        Schema::create('entrega_horario_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entrega_horario_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->timestamps();

            $table->foreign('entrega_horario_id')->references('id')->on('entrega_horarios')->onDelete('cascade');
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
        Schema::dropIfExists('entrega_horarios');
    }
}
