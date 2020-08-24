<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Trabajadores */
        $trabajadores =[
            [
                'dni'=>'08372118',
                'nombres' => 'Administrador',
                'apellido_paterno' => 'SIGEPE',
                'apellido_materno' => 'SIGEPE'
            ],
            [
                'dni'=>'08372119',
                'nombres' => 'Duvan',
                'apellido_paterno' => 'Saenz',
                'apellido_materno' => 'Falcon'
            ],
            [
                'dni'=>'08372120',
                'nombres' => 'Miguel',
                'apellido_paterno' => 'Velasquez',
                'apellido_materno' => 'Yzquierdo'
            ],
            [
                'dni'=>'08372359',
                'nombres' => 'Joel',
                'apellido_paterno' => 'Trujillo',
                'apellido_materno' => 'Cruz'
            ],
            [
                'dni'=>'08372188',
                'nombres' => 'Britney',
                'apellido_paterno' => 'Alfaro',
                'apellido_materno' => ''
            ]
        ];
        DB::table('trabajadores')->insert($trabajadores);

        /* Roles */
        $roles =[
            [
                'nombre' => 'Admin',
                'descripcion' => 'Administrador'
            ],
            [
                'nombre' => 'JefeCompras',
                'descripcion' => 'Jefe de Compras'
            ],
            [   
                'nombre' => 'JefeProduccion',
                'descripcion' => 'Jefe de Producción'
            ],
            [
                'nombre' => 'OperarioProduccion',
                'descripcion' => 'Operario de Producción'
            ],
            [
                'nombre' => 'AtencionCliente',
                'descripcion' => 'Atención al Cliente'
            ]
        ];
        DB::table('roles')->insert($roles);

       $users = [
            [
            'email' => 'sigepe@sigepe.com',
            'password' => bcrypt('sigepe'),
            'trabajador_id'=>'1',
            'role_id'=> '1'
            ],
            [
            'email' => 'jcompras@sigepe.com',
            'password' => bcrypt('sigepe'),
            'trabajador_id'=>'2',
            'role_id'=> '2'
            ],
            [
            'email' => 'jproduccion@sigepe.com',
            'password' => bcrypt('sigepe'),
            'trabajador_id'=>'3',
            'role_id'=> '3'
            ],
            [
            'email' => 'oproduccion@sigepe.com',
            'password' => bcrypt('sigepe'),
            'trabajador_id'=>'4',
            'role_id'=> '4'
            ],
            [
            'email' => 'acliente@sigepe.com',
            'password' => bcrypt('sigepe'),
            'trabajador_id'=>'5',
            'role_id'=> '5'
            ]
        ];
        DB::table('users')->insert($users);
    }

}
