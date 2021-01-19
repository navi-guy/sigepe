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
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954073267437609/imagen1.jpg',
            'precio_unitario' => '100',
            'categoria_id'=>'1'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave metálica para auto',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte metálico para autos ',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954182148161536/imagen2.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para auto',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte plástico para autos',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954300699377664/imagen3.jpg',
            'precio_unitario' => '15.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave metálica para moto',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte metálico para motos',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954409382445106/imagen4.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para moto',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con soporte plástico para motos',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954524873130014/imagen5.jpg',
            'precio_unitario' => '15.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave residencial metálica',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas para residencial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954696122368030/imagen6.jpg',
            'precio_unitario' => '4.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave residencial metálica con diseño',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas con diseño para residencial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800954937197723658/imagen7.jpg',
            'precio_unitario' => '6.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave plástica para residencial',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves metálicas con soporte de plástico para residencial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955023718088704/imagen8.jpg',
            'precio_unitario' => '5.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave con paleta forjada para residencial',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves con paleta forjada para residencial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955089375723530/imagen9.jpg',
            'precio_unitario' => '10.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave megacanal',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves megacanal de alta seguridad',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955154811322368/imagen10.jpg',
            'precio_unitario' => '9.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave tetra',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves tetra de alta seguridad',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955233005207552/imagen11.jpg',
            'precio_unitario' => '11.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'LLave transponder',
            'material' => '2',
            'unidad_medida'=>'',
            'descripcion' => 'Llaves transponder de alta tecnología',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955349884600374/imagen12.jpg',
            'precio_unitario' => '19.9',
            'categoria_id'=>'2'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Trefilado hexagonal y redonda',
            'material' => '1',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Perfil refilado para uso industrial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955448923783198/imagen13.jpg',
            'precio_unitario' => '89.9',
            'categoria_id'=>'3'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Tee',
            'material' => '2',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Tubo "T" para uso industrial',
            'image'=>'https://cdn.discordapp.com/attachments/784644828893675550/800955517752442950/imagen14.jpg',
            'precio_unitario' => '20.9',
            'categoria_id'=>'4'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Válvula PREMIUM',
            'material' => '2',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Válvulas de uso industrial',
            'image'=>'https://cdn.discordapp.com/attachments/765870162997411853/800955170989146112/imagen15.jpg',
            'precio_unitario' => '40.9',
            'categoria_id'=>'5'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Portaválvulas de acero',
            'material' => '2',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Portaválvula de acero para uso industrial',
            'image'=>'https://media.discordapp.net/attachments/765870162997411853/800954468899225600/imagen16.jpg',
            'precio_unitario' => '10.9',
            'categoria_id'=>'6'
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Peritas',
            'material' => '2',
            'unidad_medida'=>'Pulgadas',
            'descripcion' => 'Peritas para cerraduras',
            'image'=>'https://media.discordapp.net/attachments/784644828893675550/800953153989247026/imagen17.jpg',
            'precio_unitario' => '5.9',
            'categoria_id'=>'7'
        ]);
    }
}
