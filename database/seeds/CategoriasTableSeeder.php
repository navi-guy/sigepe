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
    }
}
