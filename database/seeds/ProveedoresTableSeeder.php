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
           // 'email' => 'tbartra@lita.com.pe',
            'direccion' =>'Calle Huarán 149 - 151 . Urb.27 de Abril',
            'tipo' => '1',
            'costo_flete' => '200'
        ]);    	
        DB::table('proveedores')->insert([
            'razon_social'=>'Dincorsa',
            'ruc' => '20165016115',
            //'email' => 'contactenos@dincorsa.com.pe',
            'direccion' =>' Calle Mariscal Luzuriaga 544',
            'tipo' => '2',
            'costo_flete' => '180'
        ]);

        DB::table('proveedores')->insert([
            'razon_social'=>'EXIMPORT DISTRIBUIDORES DEL PERU SA | EDIPESA',
            'ruc' => '20100041520',
            //'email' => 'comunicaciones.peru@edipesa.com',
            'direccion' =>'Av. Argentina Nro. 1710 (Alt Av Nicolas Dueñas)',
            'tipo' => '2',
            'costo_flete' => '215'
        ]);

        DB::table('proveedores')->insert([
            'razon_social'=>'CUPRALCA SAC',
            'ruc' => '20100041596',
            //'email' => 'comunicaciones.peru@edipesa.com',
            'direccion' =>'Jr. Manuel A. Odría 298 Coop. 27 de Abril - Ate - Lima',
            'tipo' => '2',
            'costo_flete' => '250'
        ]);

        DB::table('proveedores')->insert([
            'razon_social'=>'FAME S.A.C.',
            'ruc' => '201000781596',
            //'email' => 'comunicaciones.peru@edipesa.com',
            'direccion' =>'Ex Hacienda Nievería s/n Km. 3.5 Carretera Cajamarquilla, Lurigancho Chosica - Lima',
            'tipo' => '2',
            'costo_flete' => '235'
        ]);
    }
}
