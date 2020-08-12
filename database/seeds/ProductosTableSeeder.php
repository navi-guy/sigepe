<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('productos')->insert([
            'nombre'=>'Barra redonda para forja',
            'material' => '3',
            'unidad_medida'=>'1',
            'descripcion' => 'Barra de aleación para uso industrial',
            'image'=>'dist/img/product_image/imagen1.jpg',
            'precio_unitario' => '100',
            'categoria_id'=>'1'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave metálica para auto',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte metálico para autos ',
            'image'=>'dist/img/product_image/imagen2.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para auto',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte plástico para autos',
            'image'=>'dist/img/product_image/imagen3.jpg',
            'precio_unitario' => '15.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave metálica para moto',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte metálico para motos',
            'image'=>'dist/img/product_image/imagen4.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para moto',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte plástico para motos',
            'image'=>'dist/img/product_image/imagen5.jpg',
            'precio_unitario' => '15.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave residencial metálica',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas para residencial',
            'image'=>'dist/img/product_image/imagen6.jpg',
            'precio_unitario' => '4.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave residencial metálica con diseño',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas con diseño para residencial',
            'image'=>'dist/img/product_image/imagen7.jpg',
            'precio_unitario' => '6.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para residencial',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas con soporte de plástico para residencial',
            'image'=>'dist/img/product_image/imagen8.jpg',
            'precio_unitario' => '5.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave con paleta forjada para residencial',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con paleta forjada para residencial',
            'image'=>'dist/img/product_image/imagen9.jpg',
            'precio_unitario' => '10.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave megacanal',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves megacanal de alta seguridad',
            'image'=>'dist/img/product_image/imagen10.jpg',
            'precio_unitario' => '9.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave tetra',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves tetra de alta seguridad',
            'image'=>'dist/img/product_image/imagen11.jpg',
            'precio_unitario' => '11.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave transponder',
            'material' => '0',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves transponder de alta tecnología',
            'image'=>'dist/img/product_image/imagen12.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Trefilado hexagonal y redonda',
            'material' => '1',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Perfil refilado para uso industrial',
            'image'=>'dist/img/product_image/imagen13.jpg',
            'precio_unitario' => '89.9',
            'categoria_id'=>'3'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Tee',
            'material' => '0',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Tubo "T" para uso industrial',
            'image'=>'dist/img/product_image/imagen14.jpg',
            'precio_unitario' => '20.9',
            'categoria_id'=>'4'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Válvula PREMIUM',
            'material' => '0',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Válvulas de uso industrial',
            'image'=>'dist/img/product_image/imagen15.jpg',
            'precio_unitario' => '40.9',
            'categoria_id'=>'5'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Portaválvulas de acero',
            'material' => '0',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Portaválvula de acero para uso industrial',
            'image'=>'dist/img/product_image/imagen16.jpg',
            'precio_unitario' => '10.9',
            'categoria_id'=>'6'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Peritas',
            'material' => '0',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Peritas para cerraduras',
            'image'=>'dist/img/product_image/imagen17.jpg',
            'precio_unitario' => '5.9',
            'categoria_id'=>'7'
        ]);
    }
}
