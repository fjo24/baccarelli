<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPedidosTable extends Migration
{
  public function up()
  {
      Schema::table('pedidos', function (Blueprint $table) {
          $table->integer('estado_id')->unsigned()->nullable();
          $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
      });
  }

  public function down()
  {
      Schema::table('pedidos', function (Blueprint $table) {
          $table->dropColumn('estado_id');
      });
  }
}
