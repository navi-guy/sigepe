<?php

use Illuminate\Database\Seeder;

class InsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert([
            'nombre'=>'Insumo 1',
            'cantidad' => '55',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Insumo 2',
            'cantidad' => '52',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Insumo 3',
            'cantidad' => '15',
            'unidad_medida' => '2'
        ]);                  

        DB::table('insumos')->insert([
            'nombre'=>'Latón',
            'cantidad' => '55',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Cobre',
            'cantidad' => '52',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Bronce',
            'cantidad' => '150',
            'unidad_medida' => '2'
        ]); 

        DB::table('insumos')->insert([
            'nombre'=>'Acero',
            'cantidad' => '55',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Plástico',
            'cantidad' => '52',
            'unidad_medida' => '1'
        ]);
    }
}
