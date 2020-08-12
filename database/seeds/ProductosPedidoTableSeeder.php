<?php

use Illuminate\Database\Seeder;

class ProductosPedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos_pedido')->insert([
            'pedido_id'=>'1',
            'producto_id' => '6',
            'cantidad' => '100',
            'pu' => '4.9',
            'monto' => '490'
        ]);

        DB::table('productos_pedido')->insert([
            'pedido_id'=>'2',
            'producto_id' => '1',
            'cantidad' => '20',
            'pu' => '100',
            'monto' => '2000'
        ]);

        DB::table('productos_pedido')->insert([
            'pedido_id'=>'3',
            'producto_id' => '13',
            'cantidad' => '30',
            'pu' => '89.9',
            'monto' => '2697'
        ]);

        DB::table('productos_pedido')->insert([
            'pedido_id'=>'4',
            'producto_id' => '14',
            'cantidad' => '100',
            'pu' => '20.9',
            'monto' => '2090'
        ]);

        DB::table('productos_pedido')->insert([
            'pedido_id'=>'5',
            'producto_id' => '15',
            'cantidad' => '100',
            'pu' => '40.9',
            'monto' => '4090'
        ]);
    }
}
