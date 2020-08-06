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
            $table->bigIncrements('id');
            $table->string('nro_pedido');
            $table->string('scop');
            $table->integer('galones');
            $table->integer('galones_distribuidos')->default(0);
            $table->decimal('costo_galon',9,5);
            $table->integer('estado')->default(1);
            $table->decimal('saldo',9,2)->nullable();
            $table->decimal('costo_flete')->nullable()->default(0);
            $table->string('chofer')->nullable();
            $table->string('brevete_chofer')->nullable();
            $table->unsignedBigInteger('planta_id');
            $table->foreign('planta_id')->references('id')->on('plantas');
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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign(['planta_id']);
        });


        Schema::dropIfExists('pedidos');
    }
}
