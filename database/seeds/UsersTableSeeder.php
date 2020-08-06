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
            'nombres' => 'SIGESPRO',
            'apellido_paterno' => 'SIGESPRO',
            'apellido_materno' => 'SIGESPRO',
            'telefono' => '2534035'
        ]);

        DB::table('users')->insert([
            'email' => 'sigespro@gmail.com',
            'password' => bcrypt('123456'),
            'trabajador_id'=>'1'
        ]);
    }
}
