<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Administrador',
            'apellidos' => '',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'ci' => '9866021',
            'sexo' => 'M',
            'phone' => '60522212',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '1',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Michael',
            'apellidos' => 'Humerez Estepo',
            'email' => 'a@gmail.com',
            'password' => '123456',
            'ci' => '9866024',
            'sexo' => 'M',
            'phone' => '60522214',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '1',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ])->assignRole('Administrador');
        
        User::create([
            'name' => 'Brayan',
            'apellidos' => '',
            'email' => 'b@gmail.com',
            'password' => '123456',
            'ci' => '9866022',
            'sexo' => 'M',
            'phone' => '60522211',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '1',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Camilo',
            'apellidos' => '',
            'email' => 'c@gmail.com',
            'password' => '123456',
            'ci' => '9866023',
            'sexo' => 'M',
            'phone' => '60522213',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '1',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ])->assignRole('Administrador');
    }
}
