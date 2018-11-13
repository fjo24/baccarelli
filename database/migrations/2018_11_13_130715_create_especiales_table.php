<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

      Schema::create('especial_pedido', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pedido_id')->unsigned();
          $table->integer('especial_id')->unsigned();
          $table->string('precio')->nullable();

          $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
          $table->foreign('especial_id')->references('id')->on('especiales')->onDelete('cascade');

          $table->timestamps();
      });
    }

      public function down()
      {
        Schema::dropIfExists('especial_pedido');
        Schema::dropIfExists('especiales');
      }
}
