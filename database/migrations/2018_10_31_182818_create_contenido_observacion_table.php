<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoObservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo_condiciones')->nullable();
            $table->text('contenido_condiciones')->nullable();
            $table->text('titulo_plazos')->nullable();
            $table->text('contenido_plazos')->nullable();
            $table->text('titulo_aclaraciones')->nullable();
            $table->text('contenido_aclaraciones')->nullable();
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
        Schema::dropIfExists('contenido_observaciones');
    }
}
