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
            $table->string('cod_pedido',15)->unique();
            $table->date('fecha');
            $table->string('nombre_cli');
            $table->string('direccion_cli');
            $table->string('telefono_cli');
            $table->string('ruc_cli');        
            $table->integer('estado_pedido')->default(1);
            $table->decimal('monto_bruto',9,2);
            $table->decimal('descuento',9,2);
            $table->decimal('monto_neto',9,2);
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
