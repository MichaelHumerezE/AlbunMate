<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis',
            'apellidos' => 'Martinez',
            'email' => 'Luis@gmail.com',
            'password' => '123456',
            'ci' => '9860314',
            'sexo' => 'M',
            'phone' => '60022212',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '1',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ]);

        User::create([
            'name' => 'Leopoldo',
            'apellidos' => 'Leiguez',
            'email' => 'Leopoldo@gmail.com',
            'password' => '123456',
            'ci' => '9861314',
            'sexo' => 'M',
            'phone' => '60012312',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '1',
            'tipo_f' => '0',
            'tipo_i' => '0',
        ]);
    }
}
