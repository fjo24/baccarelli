<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('numero_presupuesto', 50)->nullable();
            $table->string('numero_proyecto', 50)->nullable();
            $table->string('nombre_cliente', 100)->nullable();
            $table->string('apellido_cliente', 100)->nullable();
            $table->string('localidad', 200)->nullable();
            $table->string('telefono1', 15)->nullable();
            $table->string('telefono2', 15)->nullable();
            $table->string('telefono3', 15)->nullable();
            $table->string('encargado', 100)->nullable();
            $table->string('telefono_encargado', 15)->nullable();
            $table->text('aclaracion')->nullable();
            $table->integer('listado_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('listado_id')->references('id')->on('listados')->onDelete('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
