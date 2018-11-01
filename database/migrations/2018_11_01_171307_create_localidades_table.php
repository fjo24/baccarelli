<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadesTable extends Migration
{

    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre')->nullable();
            $table->string('horas_flete')->nullable();
            $table->string('horas_peaje')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('localidades');
    }
    
}
