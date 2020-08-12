<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categorias')->insert([
            'nombre'=>'Barras',
            'active' => '1'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'Llaves',
            'active' => '1'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'Perfiles',
            'active' => '2'
        ]);   

        DB::table('categorias')->insert([
            'nombre'=>'Productos forjados',
            'active' => '2'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'Válvulas',
            'active' => '1'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'Portaválvulas',
            'active' => '1'
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'Productos maquinados',
            'active' => '1'
        ]);
    }
}
