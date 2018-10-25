<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 15)->unique();
            $table->string('name', 50);
            $table->string('apellido', 50)->nullable();
            $table->string('email', 25)->unique();
            $table->string('cuit', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->enum('nivel', ['administrador', 'usuario', 'distribuidor'])->default('distribuidor');
            $table->enum('rango', ['b_superior', 'b_supervisor', 'b_medidor', 'b_logistica', 'b_fabrica', 'b_administrativo', 't_admin', 't_jefelinea', 't_jefetienda', 't_vendedor'])->nullable();
            $table->boolean('activo')->default('0');
            $table->string('password', 150);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
