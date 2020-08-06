<?php

use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('proveedores')->insert([
            'razon_social'=>'Mecanica Industrial Lira',
            'ruc' => '20190143806',
            'email' => 'tbartra@lita.com.pe',
            'direccion' =>'Calle Huarán 149 - 151 . Urb.27 de Abril',
            'tipo' => '1'
        ]);    	
        DB::table('proveedores')->insert([
            'razon_social'=>'Dincorsa',
            'ruc' => '20165016115',
            'email' => 'contactenos@dincorsa.com.pe',
            'direccion' =>' Calle Mariscal Luzuriaga 544',
            'tipo' => '2'
        ]);

        DB::table('proveedores')->insert([
            'razon_social'=>'EXIMPORT DISTRIBUIDORES DEL PERU SA | EDIPESA',
            'ruc' => '20100041520',
            'email' => 'comunicaciones.peru@edipesa.com',
            'direccion' =>'Av. Argentina Nro. 1710 (Alt Av Nicolas Dueñas)',
            'tipo' => '2'
        ]);
    }
}
