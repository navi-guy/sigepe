<?php

use Illuminate\Database\Seeder;

class Insumos_ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos_proveedor')->insert([
            'insumo_id'=>'1',
            'proveedor_id' => '1',
            'precio_compra' => '20'
        ]);

    }
}
