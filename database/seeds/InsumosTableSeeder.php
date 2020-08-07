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
        DB::table('plantas')->insert([
            'nombre'=>'Insumo 1',
            'cantidad' => '55',
            'unidad_medida' => 'kg'
        ]);

        DB::table('plantas')->insert([
            'nombre'=>'Insumo 1',
            'cantidad' => '52',
            'unidad_medida' => 'kg'
        ]);

        DB::table('plantas')->insert([
            'nombre'=>'Insumo 1',
            'cantidad' => '15',
            'unidad_medida' => 'u'
        ]);                  
    }
}
