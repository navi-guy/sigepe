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
        DB::table('trabajadores')->insert([
            'dni'=>'08372118',
            'nombres' => 'SIGEPE',
            'apellido_paterno' => 'SIGEPE',
            'apellido_materno' => 'SIGEPE',
            'telefono' => '2534035'
        ]);

        DB::table('users')->insert([
            'email' => 'sigespro@gmail.com',
            'password' => bcrypt('123456'),
            'trabajador_id'=>'1'
        ]);
    }
}
