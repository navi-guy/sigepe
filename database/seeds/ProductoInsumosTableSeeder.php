<?php

use Illuminate\Database\Seeder;

class ProductoInsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto_insumos')->insert([
            'insumo_id'=>'1',
            'producto_id' => '1',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '2',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '3',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'8',
            'producto_id' => '3',
            'cantidad' => '1'
        ]);
       
        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '4',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '5',
            'cantidad' => '1'
        ]);
        DB::table('producto_insumos')->insert([
            'insumo_id'=>'8',
            'producto_id' => '5',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '6',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '7',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '8',
            'cantidad' => '1'
        ]);
        
        DB::table('producto_insumos')->insert([
            'insumo_id'=>'8',
            'producto_id' => '8',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '9',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '9',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '9',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '9',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '10',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '11',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '12',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'1',
            'producto_id' => '13',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'6',
            'producto_id' => '14',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'6',
            'producto_id' => '15',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'7',
            'producto_id' => '15',
            'cantidad' => '1'
        ]);

        DB::table('producto_insumos')->insert([
            'insumo_id'=>'5',
            'producto_id' => '16',
            'cantidad' => '1'
        ]);
    }
}
