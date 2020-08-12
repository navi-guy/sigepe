<?php

use Illuminate\Database\Seeder;

class PedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Llaves para residencia 4.9 /100
        DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-001',
            'fecha' => '05/08/2020',
            'nombre_cli' => 'Juan José Juarez Julca',
            'direccion_cli' => 'San Martín de Porres 345',
            'telefono_cli' => '978695952',
            'ruc_cli' => '20001569748',
            'estado_pedido' => '1',
            'monto_bruto' => '490',
            'monto_descuento' => '0',
            'monto_neto' => '490'
        ]);

        //barras para forja 100/20
        DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-002',
            'fecha' => '02/08/2020',
            'nombre_cli' => 'Raul Ramirez Romero',
            'direccion_cli' => 'San Martín de Porres 375',
            'telefono_cli' => '978695952',
            'ruc_cli' => '20001569796',
            'estado_pedido' => '1',
            'monto_bruto' => '2000',
            'monto_descuento' => '100',
            'monto_neto' => '1900'
        ]);

        //Trefilado 89.9/30
        DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-003',
            'fecha' => '02/04/2020',
            'nombre_cli' => 'Teodoro Trujillo Trejo',
            'direccion_cli' => 'San Miguel 375',
            'telefono_cli' => '978699352',
            'ruc_cli' => '20001479796',
            'estado_pedido' => '1',
            'monto_bruto' => '2697',
            'monto_descuento' => '100',
            'monto_neto' => '2597'
        ]);

        //Trefilado 89.9/30
        DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-003',
            'fecha' => '02/04/2020',
            'nombre_cli' => 'Teodoro Trujillo Trejo',
            'direccion_cli' => 'San Miguel 375',
            'telefono_cli' => '978699352',
            'ruc_cli' => '20001479796',
            'estado_pedido' => '1',
            'monto_bruto' => '2697',
            'monto_descuento' => '100',
            'monto_neto' => '2597'
        ]);

           //Tee 20.9/100
           DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-004',
            'fecha' => '02/04/2020',
            'nombre_cli' => 'Luis Lopez Luna',
            'direccion_cli' => 'San Miguel 375',
            'telefono_cli' => '978699352',
            'ruc_cli' => '20001479796',
            'estado_pedido' => '1',
            'monto_bruto' => '2090',
            'monto_descuento' => '100',
            'monto_neto' => '1990'
        ]);

          //Valvula premium 40.9/100
          DB::table('pedidos')->insert([
            'cod_pedido'=>'ped-005',
            'fecha' => '02/04/2020',
            'nombre_cli' => 'Pedro Perez Puerta',
            'direccion_cli' => 'San Miguel 375',
            'telefono_cli' => '978699352',
            'ruc_cli' => '20001479796',
            'estado_pedido' => '1',
            'monto_bruto' => '4090',
            'monto_descuento' => '200',
            'monto_neto' => '3890'
        ]);
    }
}
