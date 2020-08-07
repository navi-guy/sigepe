<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('insumos_id')->nullable();
            $table->foreign('insumo_id')->references('id')->on('insumos');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('cantidad');
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
        Schema::table('producto_insumos', function (Blueprint $table) {
            $table->dropForeign(['insumo_id']);
            $table->dropForeign(['producto_id']);            
        });
        Schema::dropIfExists('producto_insumos');
    }
}
