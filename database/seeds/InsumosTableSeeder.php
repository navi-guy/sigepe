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
            'nombre'=>'Vigas de cobre',
            'cantidad' => '55',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Viga de acero',
            'cantidad' => '52',
            'unidad_medida' => '1'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Alambre de cobre',
            'cantidad' => '15',
            'unidad_medida' => '3'
        ]);                  

        DB::table('insumos')->insert([
            'nombre'=>'Latón',
            'cantidad' => '55',
            'unidad_medida' => '3'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Cobre',
            'cantidad' => '52',
            'unidad_medida' => '3'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Bronce',
            'cantidad' => '150',
            'unidad_medida' => '3'
        ]); 

        DB::table('insumos')->insert([
            'nombre'=>'Acero',
            'cantidad' => '55',
            'unidad_medida' => '3'
        ]);

        DB::table('insumos')->insert([
            'nombre'=>'Plástico',
            'cantidad' => '52',
            'unidad_medida' => '1'
        ]);
    }
}
