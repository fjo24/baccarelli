<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('numero_cambio')->nullable();
            $table->string('espesor')->nullable();
            $table->string('orden')->nullable();
            $table->text('codigo')->nullable();
            $table->string('precio')->nullable();//precio lista
            $table->string('cost')->nullable();//precio resultante del descuento
            $table->string('precio_dolar')->nullable();//precio lista
            $table->string('cost_dolar')->nullable();//precio resultante del descuento
            $table->boolean('leather')->nullable()->default('0');
            $table->boolean('rp')->nullable()->default('0');
            $table->boolean('diamantado')->nullable()->default('0');
            $table->string('moneda')->nullable();
            $table->integer('rubro_id')->unsigned()->nullable();
            $table->integer('observacion_id')->unsigned()->nullable();
            $table->integer('stock_id')->unsigned()->nullable();
            $table->integer('descuento_id')->unsigned()->nullable();

            $table->foreign('descuento_id')->references('id')->on('descuentos')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('cascade');
            $table->foreign('observacion_id')->references('id')->on('observaciones')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('material_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('superficie_id')->unsigned()->nullable();
            $table->string('largo')->nullable();
            $table->string('ancho')->nullable();
            $table->string('metros_cuadrados')->nullable();
            $table->string('precio_unit_material')->nullable();//
            $table->string('costo');

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materiales')->onDelete('cascade');
            $table->foreign('superficie_id')->references('id')->on('superficies')->onDelete('cascade');
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
        Schema::dropIfExists('materiales');
    }
}
